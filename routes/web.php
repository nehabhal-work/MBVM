<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

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

Route::get('/contact-qr', [Controller::class, 'qr'])->name('contact.qr');
