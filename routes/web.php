<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


//Auth Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/register', [LoginController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [LoginController::class, 'register']);

Route::middleware('auth')->group(function () {

    Route::get('/', function () {
        if(auth()->user()->is_admin === 1) {
            return redirect()->route('users.index');
        }else{
            return redirect()->route('users.profile');
        }
    });

    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    //User routes
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('users/profile', [UserController::class, 'profile'])->name('users.profile');
    Route::get('users/change-password', [UserController::class, 'showChangePassword'])->name('users.change-password');
    Route::post('users/change-password', [UserController::class, 'changePassword']);
});
