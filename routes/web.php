<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;


Route::get('/', function () {
    return view('home');
})->name('home');
Route::get('/home', function () {
    return view('home');
})->name('home');
Route::get('/about', function () {
    return view('about');
})->name('about');
// Route::get('/contact', function () {
//     return view('contact');
// })->name('contact');
Route::resource('members', MemberController::class)
    ->only(['create', 'store', 'index']);

Route::get('/parichay-details', function () {
    return view('parichay-details');
})->name('parichay-details');


Route::get('/contact-qr', [Controller::class, 'qr'])->name('contact.qr');
