<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SupermarketController;

Route::get('/', function () {
    return view('register');
});
Route::get('/signin', function () {
    return view('login.signin');
});
Route::get('/signup', function () {
    return view('login.signup');
    return view('homepage.userhomepage');
});

Route::get('/order', function () {
    return view('homepage.order');
})->name('order');
Route::get('/register', function () {
    return view('register');
})->name('register');

// Rute GET untuk menampilkan form registrasi supermarket
Route::get('/signup/supermarket', function () {
    return view('signup.supermarket');  // Sesuaikan dengan lokasi file
})->name('signup.supermarket');

// Rute POST untuk memproses data form
Route::post('/register/supermarket', [SupermarketController::class, 'register'])->name('supermarket.register');

Route::get('/signup/customer', function () {
    return view('signup.customer');  // Arahkan ke resources/views/signup/customer.blade.php
})->name('signup.customer');
// Rute POST untuk memproses formulir registrasi customer
Route::post('/register/customer', [CustomerController::class, 'register'])->name('customer.register');
Route::get('/signup', function () {    
    return view('signup'); 
})->name('signup');
// Rute GET untuk menampilkan halaman lanjutan form (tahap 2)
Route::get('/signup/supermarket/step2', function () {
    return view('signup.supermarket_step2');  // Sesuaikan dengan nama file
})->name('signup.supermarket.step2');

// Rute POST untuk memproses data form (tahap 2)
Route::post('/register/supermarket/step2', [SupermarketController::class, 'registerStep2'])->name('supermarket.register.stage2');
