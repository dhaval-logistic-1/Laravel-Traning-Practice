<?php


use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});

Route::post('login',[LoginController::class,'login']);
Route::get('logout',[LoginController::class,'logout']);

Route::get('register', [RegisterController::class, 'register']);
Route::post('register', [RegisterController::class, 'store']);


Route::prefix('user/')->group(function () {
    Route::get('list', [UserController::class, 'index']);
    Route::get('create', [UserController::class, 'create']);
    Route::post('store', [UserController::class, 'store']);
    Route::get('edit/{id}', [UserController::class, 'edit']);
    Route::put('update/{id}', [UserController::class, 'update']);
    Route::get('delete/{id}', [UserController::class, 'delete']);
    Route::get('{id}', [UserController::class, 'show']);
});
