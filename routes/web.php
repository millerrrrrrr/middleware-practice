<?php

use App\Http\Controllers\AccountController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AccountController::class, 'login'])->name('login');
Route::get('/register', [AccountController::class, 'register'])->name('register');

Route::post('/', [AccountController::class, 'loginPost'])->name('loginPost');
Route::post('/register', [AccountController::class, 'registerPost'])->name('registerPost');
