<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


// Route::get('admin/store', [AdminController::class, 'store']);

// Route::get('admin/list', [AdminController::class, 'list']);

// Route::get('admin/update', [AdminController::class, 'update']);

// Route::get('admin/delete', [AdminController::class, 'delete']);


// Route::prefix('admin/')->group(function () {

//     Route::get('store', [AdminController::class, 'store']);

//     Route::get('list', [AdminController::class, 'list']);

//     Route::get('update', [AdminController::class, 'update']);

//     Route::get('delete', [AdminController::class, 'delete']);
// });

Route::controller(AdminController::class)->group(function () {
    Route::prefix('admin/')->group(function () {

        Route::get('store' , 'store');
        Route::get('list','list');
        Route::get('update', 'update');
        Route::get('delete', 'delete');

    });
});
