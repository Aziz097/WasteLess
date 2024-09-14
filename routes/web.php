<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login.login');
});
Route::get('/signin', function () {
    return view('login.signin');
});
Route::get('/signup', function () {
    return view('login.signup');
});
Route::get('/otp', function () {
    return view('login.otp');
});


