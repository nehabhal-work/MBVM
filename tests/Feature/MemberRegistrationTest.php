<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MemberRegistrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_registration_page_uses_the_shared_hero_and_screenshot_fields(): void
    {
        $this->get(route('members.create'))
            ->assertOk()
            ->assertSee('member-registration-page__hero')
            ->assertSee('MahaRERA नोंदणी क्रमांक')
            ->assertSee('व्यवसायाविषयी थोडक्यात')
            ->assertSee('contact_consent');
    }

    public function test_registration_saves_the_additional_details_and_contact_consent(): void
    {
        $this->post(route('members.store'), [
            'name' => 'नितीन देशपांडे',
            'mobile' => '9876543210',
            'email' => 'nitin@example.com',
            'jilha' => 'पुणे',
            'taluka' => 'हवेली',
            'city' => 'पुणे',
            'company_name' => 'उदाहरण बिल्डर्स',
            'state' => 'महाराष्ट्र',
            'address' => 'मुख्य रस्ता, पुणे',
            'village' => 'हिंजवडी',
            'business_type' => 'विकासक / बिल्डर',
            'website' => 'https://example.com',
            'maharera_number' => 'P52100000000',
            'business_details' => 'निवासी प्रकल्प',
            'contact_consent' => '1',
        ])
            ->assertRedirect(route('members.create'))
            ->assertSessionHas('success');

        $this->assertDatabaseHas('members', [
            'email' => 'nitin@example.com',
            'state' => 'महाराष्ट्र',
            'address' => 'मुख्य रस्ता, पुणे',
            'village' => 'हिंजवडी',
            'business_type' => 'विकासक / बिल्डर',
            'website' => 'https://example.com',
            'maharera_number' => 'P52100000000',
            'business_details' => 'निवासी प्रकल्प',
            'contact_consent' => 1,
        ]);
    }

    public function test_registration_requires_contact_consent(): void
    {
        $this->from(route('members.create'))
            ->post(route('members.store'), [
                'name' => 'नितीन देशपांडे',
                'mobile' => '9876543210',
                'email' => 'nitin@example.com',
                'jilha' => 'पुणे',
                'taluka' => 'हवेली',
                'city' => 'पुणे',
                'company_name' => 'उदाहरण बिल्डर्स',
                'state' => 'महाराष्ट्र',
                'address' => 'मुख्य रस्ता, पुणे',
                'business_type' => 'विकासक / बिल्डर',
            ])
            ->assertRedirect(route('members.create'))
            ->assertSessionHasErrors('contact_consent');
    }
}
