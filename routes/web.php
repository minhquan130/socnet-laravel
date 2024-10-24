<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
// use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ForgetPasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostCotroller;

Route::get('/', [PostCotroller::class, 'showPosts'])->name('home');
Route::post('/', [HomeController::class, 'index'])->name('home');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('login.store');

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

// Route::get('/logout', [LogoutController::class, 'index'])->name('register');
// Route::post('/logout', [LogoutController::class, 'store'])->name('register.store');

Route::get('/forgetpassword', [ForgetPasswordController::class, 'index'])->name('forgetpassword');

Route::post('/post', [PostCotroller::class, 'addPost'])->name('post.add');
Route::get('/post', [PostCotroller::class, 'addPost'])->name('post.like');
