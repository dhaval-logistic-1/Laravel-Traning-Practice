<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::view('/login','login');

Route::post('login',[UserController::class,'login']);
Route::middleware('user.auth')->get('/', [ProductController::class, 'index']);
