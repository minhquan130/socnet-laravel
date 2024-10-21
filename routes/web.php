<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ForgetPasswordController;

Route::get('/login', [
    LoginController::class,
    'index'
])->name('login');

Route::get('/register', [
    RegisterController::class,
    'index'
])->name('register');

Route::get('/forgetpassword', [
    ForgetPasswordController::class,
    'index'
])->name('forgetpassword');