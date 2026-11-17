<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\EnquiryController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\OtpController;
use App\Http\Controllers\Auth\PasswordResetController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\DocumentController;
use App\Http\Controllers\Admin\StaffController;
use App\Models\Banner;
use App\Models\Document;
use App\Support\OrganizationDirectory;
use App\Http\Controllers\SandhiListingController;
use App\Models\SandhiListing;
use App\Models\District;
use App\Models\Member;
use App\Models\KaryaUpdate;
use App\Http\Controllers\Admin\KaryaUpdateController;

// ---------- STATIC PAGES ----------
$renderHome = function (Request $request) {
    // "आमचे कार्य" — the updates chosen in ERP to show on the home page
    $karyaUpdates = KaryaUpdate::forHome();

    $registrationAreas = OrganizationDirectory::areas();
    $districtDirectory = OrganizationDirectory::districts($registrationAreas);
    $organizationStats = OrganizationDirectory::stats($districtDirectory);

    $selectedDistrict = (string) $request->query('district', '');
    $selectedTaluka = (string) $request->query('taluka', '');
    $selectedStatus = (string) $request->query('status', '');

    if (!in_array($selectedStatus, ['threshold-reached', 'registering'], true)) {
        $selectedStatus = '';
    }

    $visibleDistricts = OrganizationDirectory::filter($districtDirectory, $selectedDistrict, $selectedTaluka, $selectedStatus);

    $districtOptions = $districtDirectory->pluck('name');
    // Each taluka keeps its district, so the taluka dropdown can follow the selected district
    $talukaOptions = $registrationAreas
        ->filter(fn($area) => filled($area->taluka))
        ->unique(fn($area) => $area->jilha . '|' . $area->taluka)
        ->sortBy('taluka')
        ->map(fn($area) => ['name' => $area->taluka, 'district' => $area->jilha])
        ->values();

    $banners = Banner::active()->get();
    $sandhiListings = SandhiListing::published()->latest()->take(3)->get();
    // Featured ad card: newest approved listing that has an image attached
    $sandhiFeatured = SandhiListing::published()->latest()->get()->first(
        fn($listing) => collect($listing->documents)->contains(fn($path) => preg_match('/\.(jpe?g|png|webp)$/i', $path))
    );

    return view('home', compact(
        'districtDirectory',
        'visibleDistricts',
        'organizationStats',
        'districtOptions',
        'talukaOptions',
        'selectedDistrict',
        'selectedTaluka',
        'selectedStatus',
        'karyaUpdates',
        'banners',
        'sandhiListings',
        'sandhiFeatured'
    ));
};

Route::get('/', $renderHome)->name('home');

Route::get('/home', $renderHome)->name('home.alias');

Route::get('/karya', function () {
    $karyaUpdates = KaryaUpdate::active()->get();

    return view('karya', compact('karyaUpdates'));
})->name('karya.index');

// Route::get('/about', function () {
//     return view('about');
// })->name('about');

Route::get('/parichay-details', function () {
    return view('parichay-details');
})->name('parichay-details');

Route::get('/pratinidhi', function () {
    return view('pratinidhi');
})->name('pratinidhi');

Route::get('/dastaivaj', function () {
    $documents = Document::active()->get();

    return view('dastaivaj', compact('documents'));
})->name('documents.index');

Route::get('/sandhi', function () {
    $districts = District::query()->orderBy('name')->get(['id', 'name']);
    $listings = SandhiListing::published()->latest()->get();

    return view('sandhi', compact('districts', 'listings'));
})->name('sandhi.index');

Route::post('/sandhi', [SandhiListingController::class, 'store'])
    ->middleware('throttle:5,1')
    ->name('sandhi.store');

// ---------- PUBLIC: contact (संपर्क) enquiry form ----------
Route::post('/sampark', [EnquiryController::class, 'store'])
    ->middleware('throttle:5,1')
    ->name('enquiries.store');

// ---------- PUBLIC: member registration form ----------
Route::get('/sadasyatva-form', [MemberController::class, 'create'])->name('members.create');
Route::post('/sadasyatva-form', [MemberController::class, 'store'])->name('members.store');

// ---------- ANY LOGGED-IN USER: member list ----------
Route::middleware('auth')->group(function () {
    Route::get('/sadasyatva-list', [MemberController::class, 'index'])->name('members.index');
});

// ---------- ADMIN ONLY: registered users list ----------
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/registered-users', [UserController::class, 'index'])->name('admin.users.index');
    Route::get('/registered-users/export', [UserController::class, 'exportMembers'])->name('admin.members.export');
    Route::patch('/registered-users/members/{member}/status', [UserController::class, 'updateMemberStatus'])->name('admin.members.status');

    Route::prefix('/registered-users/sandhi/{listing}')->name('admin.sandhi.')->group(function () {
        Route::patch('/approve', [SandhiListingController::class, 'approve'])->name('approve');
        Route::patch('/reject', [SandhiListingController::class, 'reject'])->name('reject');
        Route::patch('/pause', [SandhiListingController::class, 'pause'])->name('pause');
        Route::patch('/review', [SandhiListingController::class, 'review'])->name('review');
        Route::patch('/paid', [SandhiListingController::class, 'markPaid'])->name('paid');
        Route::post('/remind', [SandhiListingController::class, 'remind'])->name('remind');
    });

    // Home page banners
    Route::post('/erp/banners', [BannerController::class, 'store'])->name('admin.banners.store');
    Route::put('/erp/banners/{banner}', [BannerController::class, 'update'])->name('admin.banners.update');
    Route::patch('/erp/banners/{banner}/toggle', [BannerController::class, 'toggle'])->name('admin.banners.toggle');
    Route::delete('/erp/banners/{banner}', [BannerController::class, 'destroy'])->name('admin.banners.destroy');

    // आमचे कार्य (karya page + home page section)
    Route::post('/erp/karya', [KaryaUpdateController::class, 'store'])->name('admin.karya.store');
    Route::put('/erp/karya/{karya}', [KaryaUpdateController::class, 'update'])->name('admin.karya.update');
    Route::patch('/erp/karya/{karya}/toggle', [KaryaUpdateController::class, 'toggle'])->name('admin.karya.toggle');
    Route::patch('/erp/karya/{karya}/home', [KaryaUpdateController::class, 'toggleHome'])->name('admin.karya.home');
    Route::delete('/erp/karya/{karya}', [KaryaUpdateController::class, 'destroy'])->name('admin.karya.destroy');

    // संपर्क चौकशी
    Route::patch('/erp/enquiries/{enquiry}/status', [EnquiryController::class, 'updateStatus'])->name('admin.enquiries.status');
    Route::delete('/erp/enquiries/{enquiry}', [EnquiryController::class, 'destroy'])->name('admin.enquiries.destroy');

    // दस्तऐवज
    Route::post('/erp/documents', [DocumentController::class, 'store'])->name('admin.documents.store');
    Route::put('/erp/documents/{document}', [DocumentController::class, 'update'])->name('admin.documents.update');
    Route::patch('/erp/documents/{document}/toggle', [DocumentController::class, 'toggle'])->name('admin.documents.toggle');
    Route::delete('/erp/documents/{document}', [DocumentController::class, 'destroy'])->name('admin.documents.destroy');
});

// ---------- SUPER ADMIN ONLY: staff logins & roles ----------
Route::middleware(['auth', 'superadmin'])->group(function () {
    Route::post('/erp/staff', [StaffController::class, 'store'])->name('admin.staff.store');
    Route::patch('/erp/staff/{user}/role', [StaffController::class, 'updateRole'])->name('admin.staff.role');
    Route::patch('/erp/staff/{user}/password', [StaffController::class, 'resetPassword'])->name('admin.staff.password');
    Route::delete('/erp/staff/{user}', [StaffController::class, 'destroy'])->name('admin.staff.destroy');
});
Route::get('/get-talukas/{district}', function (District $district) {
    return response()->json(
        $district->talukas()->orderBy('name')->pluck('name')
    );
})->name('talukas.byDistrict');

Route::get('/get-cities/{district}', function (District $district) {
    return response()->json(
        $district->cities()->orderBy('name')->pluck('name')
    );
})->name('cities.byDistrict');

// ---------- GUEST-ONLY: register / login / password reset ----------
Route::get('/register', [AuthController::class, 'showRegister'])->name('register.show');
Route::post('/register', [AuthController::class, 'register'])->name('register.store');
Route::middleware('guest')->group(function () {

    Route::get('/login', [AuthController::class, 'showLogin'])->name('login.show');
    Route::post('/login', [AuthController::class, 'login'])->name('login.store');

    Route::get('/forgot-password', [PasswordResetController::class, 'showForgot'])->name('password.forgot.show');
    Route::post('/forgot-password', [PasswordResetController::class, 'sendOtp'])->name('password.forgot.send');

    Route::get('/reset-password', [PasswordResetController::class, 'showReset'])->name('password.reset.show');
    Route::post('/reset-password', [PasswordResetController::class, 'reset'])->name('password.reset.update');
});

// OTP verify — accessible whether logged in or not (register flow needs it before login)
Route::get('/verify-otp', [OtpController::class, 'show'])->name('otp.verify.show');
Route::post('/verify-otp', [OtpController::class, 'verify'])->name('otp.verify.submit');
Route::post('/resend-otp', [OtpController::class, 'resend'])->name('otp.resend');

// ---------- LOGOUT ----------
Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');
