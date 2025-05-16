<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\File_UploadController;

// Authentication Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);
});

Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

// Redirect root to login if not authenticated
Route::get('/', function () {
    return redirect()->route('products.index');
});

// Product Routes (protected by auth middleware)
Route::middleware('auth')->group(function () {
    Route::resource('products', ProductController::class);
});

Route ::get("upload", [File_UploadController::class, "create"]);


