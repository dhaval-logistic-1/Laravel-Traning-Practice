<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});


Route::post('user/login',[LoginController::class,'login'])->name('user.login');



Route::get('register', [RegisterController::class, 'register'])->name('register.form');


Route::post('register', [RegisterController::class, 'store'])->name('register.store');    