<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class UserController extends Controller
{
    function getdata(){
        $data = Http::get('https://jsonplaceholder.typicode.com/users/1');
        $data = $data->body();
        return view('/user',['data'=>json_decode($data)]);
    }
}
