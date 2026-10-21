<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\OtpController;
use App\Http\Controllers\Auth\PasswordResetController;
use App\Http\Controllers\Admin\UserController;
use App\Models\District;
use App\Models\Member;

$karyaUpdates = [
    [
        'date' => '२८ सप्टेंबर २०२६',
        'category' => 'शासनाकडे निवेदने',
        'title' => 'UDCPR मधील TDR वापर मर्यादेबाबत नगरविकास विभागाकडे निवेदन',
        'excerpt' => 'राज्यातील विकासकांच्या अडचणी मांडणारे सविस्तर निवेदन; बैठक ऑक्टोबरमध्ये अपेक्षित.',
        'authority' => 'नगरविकास विभाग, मंत्रालय',
        'outcome' => 'सादर',
    ],
    [
        'date' => '१५ सप्टेंबर २०२६',
        'category' => 'प्राधिकरणांशी बैठका',
        'title' => 'MahaRERA सोबत प्रकल्प नोंदणी प्रक्रियेवर चर्चा',
        'excerpt' => 'नोंदणी अर्जातील त्रुटी-सूचना वेळेत मिळाव्यात यासाठी महासंघाची मागणी.',
        'authority' => 'MahaRERA, मुंबई',
        'outcome' => 'बैठक झाली',
    ],
    [
        'date' => '२२ जून २०२६',
        'category' => 'कार्यक्रम',
        'title' => 'पुणे येथे आशियाना बैठक — जिल्हा संघटना बळकटीकरण',
        'excerpt' => 'पुणे जिल्हा संघटनेच्या कार्यकारिणीसोबत महासंघ पदाधिकाऱ्यांची बैठक.',
        'authority' => '',
        'outcome' => '',
    ],
    [
        'date' => '०५ जून २०२६',
        'category' => 'नियामक बाबी',
        'title' => 'पर्यावरण परवानगी प्रक्रियेतील विलंबाबाबत निवेदन',
        'excerpt' => 'मोठ्या प्रकल्पांसाठी पर्यावरण परवानगी प्रक्रियेतील विलंब कमी करण्याची मागणी.',
        'authority' => 'पर्यावरण विभाग',
        'outcome' => 'सादर',
    ],
    [
        'date' => '१८ मे २०२६',
        'category' => 'स्थानिक संघटना उपक्रम',
        'title' => 'नागपूर संघटनेच्या उपक्रमांचा आढावा',
        'excerpt' => 'स्थानिक विकासकांच्या प्रश्नांवर चर्चा करून पुढील कामाचे नियोजन.',
        'authority' => '',
        'outcome' => '',
    ],
];

// ---------- STATIC PAGES ----------
$renderHome = function (Request $request) use ($karyaUpdates) {
    $karyaUpdates = collect($karyaUpdates);

    $registrationAreas = Member::query()
        ->select('jilha', 'taluka')
        ->selectRaw('COUNT(*) as registration_count')
        ->groupBy('jilha', 'taluka')
        ->orderBy('jilha')
        ->orderBy('taluka')
        ->get();

    $districtDirectory = $registrationAreas
        ->groupBy('jilha')
        ->map(function ($areas, $district) {
            $registrationCount = (int) $areas->sum('registration_count');

            return [
                'name' => $district,
                'talukas' => $areas->pluck('taluka')->filter()->unique()->values(),
                'registration_count' => $registrationCount,
                'status' => $registrationCount >= MemberController::DISTRICT_THRESHOLD
                    ? 'threshold-reached'
                    : 'registering',
            ];
        })
        ->values();

    $organizationStats = [
        'districts' => $districtDirectory->count(),
        'threshold_reached' => $districtDirectory->where('status', 'threshold-reached')->count(),
        'registering' => $districtDirectory->where('status', 'registering')->count(),
        'registrations' => $districtDirectory->sum('registration_count'),
    ];

    $selectedDistrict = (string) $request->query('district', '');
    $selectedTaluka = (string) $request->query('taluka', '');
    $selectedStatus = (string) $request->query('status', '');

    if (!in_array($selectedStatus, ['threshold-reached', 'registering'], true)) {
        $selectedStatus = '';
    }

    $visibleDistricts = $districtDirectory
        ->when($selectedDistrict !== '', fn ($districts) => $districts->where('name', $selectedDistrict))
        ->when($selectedTaluka !== '', fn ($districts) => $districts->filter(
            fn ($district) => $district['talukas']->contains($selectedTaluka)
        ))
        ->when($selectedStatus !== '', fn ($districts) => $districts->where('status', $selectedStatus))
        ->values();

    $districtOptions = $districtDirectory->pluck('name');
    $talukaOptions = $registrationAreas->pluck('taluka')->filter()->unique()->sort()->values();

    return view('home', compact(
        'districtDirectory',
        'visibleDistricts',
        'organizationStats',
        'districtOptions',
        'talukaOptions',
        'selectedDistrict',
        'selectedTaluka',
        'selectedStatus',
        'karyaUpdates'
    ));
};

Route::get('/', $renderHome)->name('home');

Route::get('/home', $renderHome)->name('home.alias');

Route::get('/karya', function () use ($karyaUpdates) {
    $karyaUpdates = collect($karyaUpdates);

    return view('karya', compact('karyaUpdates'));
})->name('karya.index');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/parichay-details', function () {
    return view('parichay-details');
})->name('parichay-details');

Route::get('/pratinidhi', function () {
    return view('pratinidhi');
})->name('pratinidhi');

Route::get('/dastaivaj', function () {
    return view('dastaivaj');
})->name('documents.index');

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
Route::middleware('guest')->group(function  () {

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