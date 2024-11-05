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

    Route::get('/chats/message/{id}', [ChatController::class, 'index'])->name('chats');
    Route::post('/chats/message/{id}', [ChatController::class, 'store'])->name('chats');

    Route::get('/friends', [UserController::class, 'showFriends'])->name('friends');
    Route::get('/friends/request', [UserController::class, 'showFriendsRequest'])->name('friends.request');
    Route::get('/friends/add/{id}', [UserController::class, 'addFriends'])->name('friends.add');
        
    // Route cho việc bình luận
    Route::post('/comment/add', [CommentController::class, 'addComment'])->name('comment.add');
    // Route::get('/post/{id}', [CommentController::class, 'show'])->name('post.show');
    

    Route::get('/like/post-{id}', [PostController::class, 'like'])->name('post.like');
    Route::post('/like/post-{id}', [PostController::class, 'like'])->name('post.like');
});

Route::get('/register', [UserController::class, 'showRegister'])->name('register');
Route::post('/register', [UserController::class, 'register'])->name('register.store');

Route::get('/login', [UserController::class, 'showLogin'])->name('login');
Route::post('/login', [UserController::class, 'login'])->name('login.store');

Route::get('/forgetpassword', [UserController::class, 'ShowForgetPassword'])->name('forgetpassword');




// Route::post('/post', [PostController::class, 'addPost'])->name('post.add');

// Route::get('/profile', [ProfileController::class, 'index'])->name('profile');

// Route::get('/delete-post/{id}', [PostController::class, 'deletePost'])->name('post.delete');

// // Route cho việc bình luận
// Route::post('/posts/{id}/comments', [CommentController::class, 'store'])->name('post.store');

// Route::get('/post/{id}', [CommentController::class, 'show'])->name('post.show');

