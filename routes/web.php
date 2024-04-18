<?php

use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Auth Routes
Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'showLoginForm')->name('login');
    Route::post('/login', 'login');
});

Route::controller(RegisterController::class)->group(function () {
    Route::get('/register', 'showRegisterForm')->name('register');
    Route::post('/register', 'register');
});
Route::post('/check-email-unique', [RegisterController::class, 'checkEmailUnique'])->name('check-email-unique');

Route::middleware('auth')->group(function () {

    Route::controller(EmailVerificationController::class)->group(function () {
        Route::get('/email-verification', 'showEmailVerification')->name('email-verification');
        Route::post('/email-verification', 'emailVerification');
    });

    Route::get('/', function (Request $request) {
        if ($request->user()->isAdmin()) {
            return redirect()->route('users.index');
        } else {
            return redirect()->route('users.profile');
        }
    });

    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/admin', [UserController::class, 'index'])->name('users.index')->middleware('admin');

    Route::middleware('verified')->group(function () {
        //User routes
        Route::get('users/profile', [UserController::class, 'profile'])->name('users.profile')->middleware('verified');
        Route::get('users/change-password', [UserController::class, 'showChangePassword'])->name('users.change-password');
        Route::post('users/change-password', [UserController::class, 'changePassword']);
    });
});
