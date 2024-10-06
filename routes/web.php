<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductImageController;

Route::resource('products', ProductController::class);

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::post('products/{product}/archive', [ProductController::class, 'archive'])->name('products.archive');
Route::delete('products/images/{image}', [ProductImageController::class, 'destroy'])->name('products.images.destroy');
Route::put('products/{id}', [ProductController::class, 'update'])->name('products.update');