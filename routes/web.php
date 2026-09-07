<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\OtpController;
use App\Http\Controllers\Auth\PasswordResetController;
use App\Http\Controllers\Admin\UserController;
use App\Models\District;


// ---------- STATIC PAGES ----------
Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/home', function () {
    return view('home');
})->name('home.alias');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/parichay-details', function () {
    return view('parichay-details');
})->name('parichay-details');

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