<?php

use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


Route::middleware('SetLang')->group(function () {



    Route::view('about', 'about');
    Route::view('home', 'home');

    Route::get('setlang/{lang}', function (Request $request, $lang) {
        // session(['language' => $lang]);
        $request->session()->put('language', $lang);
        return redirect('/');
    });
    Route::get('/', function () {
        return view('welcome');
    });
});



// Route::view('users','users');

// Route::post('adduser',[UsersController::class,'adduser']);

// Route::view('login','login');

// Route::view('profile','profile');

// Route::post('login',[UsersController::class,'login']);

// Route::get('logout',[UsersController::class,'logout']);

// Route::get('/users',[UsersController::class, 'query']);

// Route::get('/demo',[UsersController::class,'demo']);

// Route::post('/users',[UsersController::class,'login']);

// Route::view('/form','users');