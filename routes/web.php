<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AccountController::class, 'login'])->name('login');
Route::get('/register', [AccountController::class, 'register'])->name('register');

Route::post('/', [AccountController::class, 'loginPost'])->name('loginPost');
Route::post('/register', [AccountController::class, 'registerPost'])->name('registerPost');

Route::prefix('admin')->controller(AdminController::class)->middleware('role:admin')->group(function(){

    Route::get('/home', 'adminHome')->name('adminHome');
    Route::post('/logout', 'logout')->name('adminLogout');

});

Route::prefix('staff')->controller(StaffController::class)->middleware('role:staff')->group(function(){

    Route::get('/home', 'staffHome')->name('staffHome');
    Route::post('/logout', 'logout')->name('staffLogout');


});

Route::prefix('teacher')->controller(TeacherController::class)->middleware('role:teacher')->group(function(){

    Route::get('/home', 'teacherHome')->name('teacherHome');
    Route::post('/logout', 'logout')->name('teacherLogout');


});