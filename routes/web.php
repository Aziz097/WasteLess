<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/search', [ProductsController::class, 'index'])->name('search');

Route::get('/searchfilter', [ProductsController::class, 'search'])->name('search');
