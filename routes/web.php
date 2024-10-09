<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/search', [ProductController::class, 'index'])->name('search');
Route::get('/searchfilter', [ProductController::class, 'search'])->name('search');
Route::get('/product', [ProductController::class, 'index']);