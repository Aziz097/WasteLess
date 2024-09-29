<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SupermarketController;

// Landing Page and Authentication Routes
Route::get('/', function () {
    return view('register');
})->name('home');

Route::get('/signin', function () {
    return view('login.signin');
})->name('signin');

Route::get('/signup', function () {
    return view('login.signup');
})->name('signup');

Route::get('/otp', function () {
    return view('login.otp');
})->name('otp');

Route::get('/register', function () {
    return view('register');
})->name('register');

// Supermarket Signup Routes
// Step 1: Display the supermarket registration form
Route::get('/signup/supermarket', [SupermarketController::class, 'showStep1'])
    ->name('signup.supermarket');

// Step 1: Handle the supermarket registration form submission
Route::post('/signup/supermarket', [SupermarketController::class, 'processStep1'])
    ->name('supermarket.register');

// Step 2: Display the continuation form (step 2)
Route::get('/signup/supermarket/step2', [SupermarketController::class, 'showStep2'])
    ->name('signup.supermarket.step2');

// Step 2: Handle the form submission for step 2
Route::post('/signup/supermarket/step2', [SupermarketController::class, 'processStep2'])
    ->name('supermarket.register.stage2');

// Customer Signup Routes
Route::get('/signup/customer', [CustomerController::class, 'showForm'])
    ->name('signup.customer');

// Handle customer registration form submission
Route::post('/register/customer', [CustomerController::class, 'register'])
    ->name('customer.register');