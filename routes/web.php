<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
// use App\Http\Controllers\RegisterController;
// use App\Http\Controllers\ForgetPasswordController;
// use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;

// Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/login', [LoginController::class, 'index'])->name('login');

// Route::get('/register', [RegisterController::class, 'index'])->name('register');

// Route::get('/forgetpassword', [ForgetPasswordController::class, 'index'])->name('forgetpassword');

Route::get('/register', [UserController::class, 'registerUser'])->name('user.register');
Route::post('/register', [UserController::class, 'store'])->name('user.store');