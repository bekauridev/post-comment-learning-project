<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// Public Routes
Route::get('/', function () {
    return view('pages.home');
});

// ================
// Login & Register
// ================

// Pages
Route::get('/login', [AuthController::class, 'login'])->name('page.login');
Route::get('/signup', [AuthController::class, 'signup'])->name('page.signup');

// Logic
Route::post('/register', [AuthController::class, 'register'])->name('auth.register');
Route::post('/auth', [AuthController::class, 'authenticate'])->name('auth.login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');