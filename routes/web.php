<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductImageController;

// Halaman utama
Route::get('/', function () {
    return view('welcome');
});

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

// Jika Anda memiliki filter pencarian atau metode lain, pastikan untuk menambahkannya di sini
Route::get('/searchfilter', [ProductController::class, 'search'])->name('searchfilter');
