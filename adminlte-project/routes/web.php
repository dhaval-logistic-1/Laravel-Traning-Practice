<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.table');
});


Route::get('/table', function () {
    return view('pages.table'); 
});