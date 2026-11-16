<?php

namespace Tests\Feature;

use App\Models\Banner;
use App\Models\Document;
use App\Models\Member;
use App\Models\SandhiListing;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class ErpContentTest extends TestCase
{
    use RefreshDatabase;

    private function user(string $role): User
    {
        return User::create([
            'name' => ucfirst($role), 'email' => "{$role}@example.test", 'password' => 'password',
            'role' => $role, 'email_verified_at' => now(),
        ]);
    }

    public function test_admin_login_lands_on_erp_dashboard(): void
    {
        $this->user('admin');

        $this->post('/login', ['email' => 'admin@example.test', 'password' => 'password'])
            ->assertRedirect(route('admin.users.index', ['tab' => 'dashboard']));
    }

    public function test_member_cannot_open_erp(): void
    {
        $this->actingAs($this->user('user'))->get('/registered-users')->assertForbidden();
    }

    public function test_banner_add_and_inactive_controls_home_page(): void
    {
        Storage::fake('public');
        $admin = $this->user('admin');
        Banner::query()->delete(); // drop the migration-seeded banners

        $this->actingAs($admin)->post(route('admin.banners.store'), [
            'heading' => 'नवीन बॅनर हेडिंग',
            'image'   => UploadedFile::fake()->image('hero.jpg', 1920, 800),
        ])->assertRedirect();

        $banner = Banner::firstOrFail();
        Storage::disk('public')->assertExists($banner->image);
        $this->get('/')->assertSee('नवीन बॅनर हेडिंग');

        $this->actingAs($admin)->patch(route('admin.banners.toggle', $banner));
        $this->assertFalse($banner->fresh()->is_active);
        $this->get('/')->assertDontSee('नवीन बॅनर हेडिंग');
    }

    public function test_home_stats_and_district_filter_use_member_data(): void
    {
        foreach ([['पुणे', 'हवेली'], ['पुणे', 'मावळ'], ['नाशिक', 'सिन्नर']] as [$jilha, $taluka]) {
            Member::create(['name' => 'X', 'mobile' => '9999999999', 'email' => 'x@example.test', 'jilha' => $jilha, 'taluka' => $taluka, 'city' => $taluka, 'company_name' => 'C']);
        }

        $this->get('/')
            ->assertViewHas('organizationStats', fn ($s) => $s['districts'] === 2 && $s['registrations'] === 3);

        $this->get('/?taluka=सिन्नर')
            ->assertViewHas('visibleDistricts', fn ($d) => $d->count() === 1 && $d->first()['name'] === 'नाशिक');
    }

    public function test_only_approved_sandhi_listings_show_on_home(): void
    {
        $base = ['name' => 'A', 'mobile' => '9999999999', 'email' => 'a@example.test', 'type' => SandhiListing::TYPES[0],
            'district' => 'पुणे', 'taluka' => 'हवेली', 'location' => 'L', 'area' => '२ एकर'];

        SandhiListing::create($base + ['brief' => 'मान्य संधी', 'status' => 'approved', 'approved_until' => today()->addDays(5)]);
        SandhiListing::create($base + ['brief' => 'प्रलंबित संधी', 'status' => 'submitted']);
        SandhiListing::create($base + ['brief' => 'बंद संधी', 'status' => 'paused']);

        $this->get('/')->assertSee('मान्य संधी')->assertDontSee('प्रलंबित संधी')->assertDontSee('बंद संधी');
    }

    public function test_documents_are_managed_from_erp(): void
    {
        Storage::fake('public');
        $admin = $this->user('admin');

        $this->actingAs($admin)->post(route('admin.documents.store'), [
            'title' => 'नवीन परिपत्रक', 'icon' => 'fa-gavel',
            'file'  => UploadedFile::fake()->create('circular.pdf', 100, 'application/pdf'),
        ])->assertRedirect();

        $doc = Document::where('title', 'नवीन परिपत्रक')->firstOrFail();
        $this->get('/dastaivaj')->assertSee('नवीन परिपत्रक')->assertSee($doc->file_url);

        $this->actingAs($admin)->patch(route('admin.documents.toggle', $doc));
        $this->get('/dastaivaj')->assertDontSee('नवीन परिपत्रक');
    }

    public function test_only_superadmin_can_create_staff_logins(): void
    {
        $payload = ['name' => 'IT Staff', 'email' => 'it@example.test', 'password' => 'secret123', 'role' => 'admin'];

        $this->actingAs($this->user('admin'))->post(route('admin.staff.store'), $payload)->assertForbidden();

        $this->actingAs($this->user('superadmin'))->post(route('admin.staff.store'), $payload)->assertRedirect();
        $this->assertSame('admin', User::where('email', 'it@example.test')->value('role'));
    }
}
