<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layouts.app');
});

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('auth.show-login-form');
Route::post('/login', [LoginController::class, 'login'])->name('auth.login');

