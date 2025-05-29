<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;

// Public routes
Route::get('/', [PostController::class, 'index'])->name('posts.index');
Route::get('/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');

// Auth routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/accepted', [AdminController::class, 'acceptedPosts'])->name('accepted');
    Route::get('/declined', [AdminController::class, 'declinedPosts'])->name('declined');
    Route::post('/posts/{post}/accept', [AdminController::class, 'acceptPost'])->name('posts.accept');
    Route::post('/posts/{post}/decline', [AdminController::class, 'declinePost'])->name('posts.decline');
    Route::delete('/posts/{post}', [AdminController::class, 'deletePost'])->name('posts.delete');
});