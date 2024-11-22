<?php

use App\Http\Controllers\ChatController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\CheckUser;
use App\Http\Controllers\ShareController;

Route::middleware([CheckUser::class])->group(function () {
    // Home
    Route::get('/get-user-id', [UserController::class, 'getUserId']);
    Route::get('/', [UserController::class, 'showHome'])->name('home');

    // Loguot
    Route::get('/logout', [LogoutController::class, 'index'])->name('logout');
    Route::post('/logout', [LogoutController::class, 'store'])->name('logout.store');

    // Post
    Route::post('/post', [PostController::class, 'addPost'])->name('post.add');
    Route::get('/delete-post/{id}', [PostController::class, 'deletePost'])->name('post.delete');

    // post-edit-post
    Route::post('/edit-post/{id}', [PostController::class, 'updatePost'])->name('post.edit');

    // Profile
    // Route::get('/profile/{userId}', [ProfileController::class, 'index'])->name('profile');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/profile/{userId}', [PostController::class, 'postProfile'])->name('profile');

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

    Route::post('/search', [SearchController::class, 'search'])->name('search');
});

Route::get('/register', [UserController::class, 'showRegister'])->name('register');
Route::post('/register', [UserController::class, 'register'])->name('register.store');

Route::get('/login', [UserController::class, 'showLogin'])->name('login');
Route::post('/login', [UserController::class, 'login'])->name('login.store');

Route::get('/forgetpassword', [UserController::class, 'ShowForgetPassword'])->name('forgetpassword');
Route::post('/sendotp', [UserController::class, 'sendOtp'])->name('sendotp');


// Hiển thị form nhập email để yêu cầu đặt lại mật khẩu
Route::get('passwords/forgot', [PasswordResetController::class, 'showForgotForm'])->name('passwords.forgot');

// Xử lý gửi email đặt lại mật khẩu
Route::post('passwords/forgot', [PasswordResetController::class, 'sendResetLink'])->name('password.sendResetLink');

// Hiển thị form để đặt lại mật khẩu mới
Route::get('passwords/reset/{token}', [PasswordResetController::class, 'showResetForm'])->name('passwords.reset');

// Xử lý cập nhật mật khẩu mới
Route::post('passwords/reset', [PasswordResetController::class, 'resetPassword'])->name('password.update');


// làm chức năng share
Route::post('/posts/{post}/share', [ShareController::class, 'share'])->name('posts.share');
