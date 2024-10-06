<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// Halaman registrasi customer
Route::get('/register/customer', [AuthController::class, 'showRegisterCustomerForm'])->name('register.customer');
Route::post('/register/customer', [AuthController::class, 'registerCustomer']);

// Halaman registrasi supermarket
Route::get('/register/supermarket', [AuthController::class, 'showRegisterSupermarketForm'])->name('register.supermarket');
Route::post('/register/supermarket', [AuthController::class, 'registerSupermarket']);

// Halaman login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
