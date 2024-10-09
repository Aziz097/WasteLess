<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductImageController;

// Halaman utama
Route::get('/', function () {
    return view('welcome');
});

// Halaman registrasi customer
Route::get('/register/customer', [AuthController::class, 'showRegisterCustomerForm'])->name('register.customer');
Route::post('/register/customer', [AuthController::class, 'registerCustomer']);

// Halaman registrasi supermarket
Route::get('/register/supermarket', [AuthController::class, 'showRegisterSupermarketForm'])->name('register.supermarket');
Route::post('/register/supermarket', [AuthController::class, 'registerSupermarket']);

// Halaman login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// Pencarian produk
Route::get('/search', [ProductController::class, 'index'])->name('search');

// Daftar produk
Route::resource('products', ProductController::class);

// Menambahkan, mengedit, menghapus produk
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::post('products/{product}/archive', [ProductController::class, 'archive'])->name('products.archive');
Route::delete('products/images/{image}', [ProductImageController::class, 'destroy'])->name('products.images.destroy');
Route::put('products/{id}', [ProductController::class, 'update'])->name('products.update');

// Rute untuk pencarian filter
Route::get('/searchfilter', [ProductController::class, 'search'])->name('searchfilter');
