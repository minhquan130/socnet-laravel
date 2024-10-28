<?php

use App\Http\Controllers\ChatController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ForgetPasswordController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CommentController;

use App\Http\Controllers\UserController;
use App\Http\Middleware\CheckUser;

Route::middleware([CheckUser::class])->group(function () {
    // Home
    Route::get('/', [UserController::class, 'showHome'])->name('home');
    
    // Loguot
    Route::get('/logout', [LogoutController::class, 'index'])->name('logout');
    Route::post('/logout', [LogoutController::class, 'store'])->name('logout.store');

    // Post
    Route::post('/post', [PostController::class, 'addPost'])->name('post.add');
    Route::get('/delete-post/{id}', [PostController::class, 'deletePost'])->name('post.delete');
    
    // Profile
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

    Route::get('/chats', [ChatController::class, 'index'])->name('chats');
        
    // Route cho việc bình luận
    Route::post('/post/{id}/comment', [CommentController::class, 'store'])->name('post.store');
    
    Route::get('/post/{id}', [CommentController::class, 'show'])->name('post.show');
});

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

Route::get('/login', [UserController::class, 'showLogin'])->name('login');
Route::post('/login', [UserController::class, 'login'])->name('login.store');


Route::get('/forgetpassword', [ForgetPasswordController::class, 'index'])->name('forgetpassword');


