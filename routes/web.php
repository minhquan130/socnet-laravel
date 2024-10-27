<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ForgetPasswordController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;

use App\Http\Controllers\UserController;

Route::get('/', [UserController::class, 'showHome'])->name('home');
// Route::post('/', [HomeController::class, 'index'])->name('home');

Route::get('/login', [UserController::class, 'showLogin'])->name('login');
Route::post('/login', [UserController::class, 'login'])->name('login.store');

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

//logout

Route::get('/logout', [LogoutController::class, 'index'])->name('logout');
Route::post('/logout', [LogoutController::class, 'store'])->name('logout.store');

Route::get('/forgetpassword', [ForgetPasswordController::class, 'index'])->name('forgetpassword');

Route::post('/post', [PostController::class, 'addPost'])->name('post.add');

Route::get('/profile', [ProfileController::class, 'index'])->name('profile');

Route::get('/delete-post/{id}', [PostController::class, 'deletePost'])->name('post.delete');
