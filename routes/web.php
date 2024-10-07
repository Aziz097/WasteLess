<?php
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SupermarketController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductImageController;
use Illuminate\Support\Facades\Auth;


// Landing Page and Authentication Routes

Route::get('/', function () {
    return view('splashscreen.splashscreen');
});

Route::get('/signin', function () {
    return view('login.login');
})->name(name: 'login');

Route::post('/login', [LoginController::class, 'login'])->name('login.post');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/signup', function () {
    return view('signup.signup');
})->name('register');

Route::get('/signup/customer', function () {
    return view('signup.signupcustomer');
});

Route::post('/register/customer', [RegisterController::class, 'registerCustomer'])->name('register.customer.post');

Route::get('/signup/supermarket', function () {
    return view('signup.signupsupermarket');
});

Route::post('/register/supermarket', action: [RegisterController::class, 'registerSupermarket'])->name('register.supermarket.post');

Route::get('/signup/supermarket/npwp', function () {
    return view('signup.npwp');
});


Route::get('/home', function () {
    return view('homepage.userhomepage');
});

Route::get('/order', function () {
    return view('homepage.order');
});

Route::get('/order/checkout', function () {
    return view('homepage.checkout');
});

Route::get('/order/status', function () {
    return view('homepage.status');
});

Route::get('/order/status/detail-order', function () {
    return view('homepage.detailorder');
});

Route::get('/profile', [CustomerController::class, 'index'])->name('profile');


Route::get('/supermarket-home', [SupermarketController::class, 'index'])->name('supermarket-home');


Route::get('/supermarket/donasi', function () {
    return view('supermarkethomepage.donasi');
});

Route::get('/supermarket/donasi/detail', function () {
    return view('supermarkethomepage.donasidetail');
});

Route::get('/supermarket/donasi/succes', function () {
    return view('supermarkethomepage.donasisucces');
});

Route::get('/supermarket/produk', function () {
    return view('supermarkethomepage.produk');
});
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::post('products/{product}/archive', [ProductController::class, 'archive'])->name('products.archive');
Route::delete('products/images/{image}', [ProductImageController::class, 'destroy'])->name('products.images.destroy');
Route::put('products/{id}', [ProductController::class, 'update'])->name('products.update');