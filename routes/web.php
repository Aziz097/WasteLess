<?php
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupermarketController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('splashscreen.splashscreen');
});



Route::get('/signin', function () {
    return view('login.login');
})->name(name: 'login');

Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/signin/otp', function () {
    return view('login.otp');
});

Route::get('/signin/location', function () {
    return view('login.location');
})->name(name: 'login.location');

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


//user
Route::get('/home', [ProductController::class, 'index'])->name('home');

Route::get('/order', [CartController::class, 'showCart'])->name('cart.show');

Route::get('/order/detail', function () {
    return view('homepage.produkdetail');
});

Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');
Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
Route::get('/cart', [CartController::class, 'viewCart'])->name('cart.view');
Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');

Route::get('/order/checkout', [CartController::class, 'showCartCheckout'])->name('cart.index');
Route::get('/cart/clear', [CartController::class, 'clearCart'])->name('cart.clear');

Route::get('/order/status', function () {
    return view('homepage.status');
});



Route::get('/order/status/detail-order', function () {
    return view('homepage.detailorder');
});

Route::get('/profile', [CustomerController::class, 'index'])->name('profile');



//supermarket
    Route::get('/supermarket-home', [SupermarketController::class, 'index'])->name('supermarket-home');

    Route::get('/supermarket/donasi', [ProductController::class, 'showAlmostExpiredProducts'])->name('almost.expired.products');

    Route::get('/supermarket/donasi/detail/{id}', [ProductController::class, 'showDonationDetail'])->name('donation.detail');
    Route::delete('/supermarket/donasi/{id}', [ProductController::class, 'donasi'])->name('donation.delete');

    Route::get('/supermarket/donasi/succes', function () {
        return view('supermarkethomepage.donasisucces');
    })->name('donasi.succes');

    Route::get('/supermarket/produk', [ProductController::class, 'showAllProducts']);
    Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');

    Route::get('/supermarket/tambah-produk', function () {
        return view('supermarkethomepage.addproduk');
    });

    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
