<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


//Auth Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/register', [LoginController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [LoginController::class, 'register']);

Route::middleware('auth')->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/', function () {
        return view('pages.user.index');
    });
    Route::get('users/change-password', [UserController::class, 'showChangePassword'])->name('users.change-password');
    Route::post('users/change-password', [UserController::class, 'changePassword']);
    Route::resource('users', UserController::class)->only(['index', 'show', 'update']);
});
