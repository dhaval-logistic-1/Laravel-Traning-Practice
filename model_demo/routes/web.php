<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('admin', AdminController::class);

Route::prefix('admin/')->group(function(){
    Route::controller(AdminController::class)->group(function(){
        Route::get('create','create');
        Route::get('list','index');
        Route::get('update/{id}','update');
        Route::get('delete/{id}','destroy');
        Route::get('{id}','show');

    });
});