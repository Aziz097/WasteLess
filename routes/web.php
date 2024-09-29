<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('homepage.userhomepage');
});

Route::get('/order', function () {
    return view('homepage.order');
})->name('order');


