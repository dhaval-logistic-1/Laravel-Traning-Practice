<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



Route::resource('student',StudentController::class);

Route::get('contact',[ContactController::class,'show']);

Route::resource('user',UserController::class);
Route::resource('post',PostController::class);
