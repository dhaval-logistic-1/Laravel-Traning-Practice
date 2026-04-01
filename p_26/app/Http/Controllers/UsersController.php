<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UsersController extends Controller
{
    function adduser(Request $request){
        $request->session()->flash('message', 'use add successfully');
        return redirect('users');
    }

    function login(Request $request){
        $request->session()->put('user',$request->input('user'));

        
        return redirect('profile');
    }

    function logout(Request $request){

        session()->pull('user');
        
        return redirect('profile');
    }


    // function query()
    // {
    //     $users = DB::table('users')->get();

    //     $users = DB::table('users')
    //             ->where('age', '>', 25)
    //             ->get();

    //     $users = DB::table('users')->insert([
    //         'name' => 'John Doe',
    //         'email' => 'jon@example.com',
    //         'age' => 30
    //     ]);

    //     $users = DB::table('users')
    //             ->where('age', '>', 20)
    //             ->update(['age' => 26]);

    //     dd("Updated $users records.");


    //     return view('users', ['users' => $users]);
    // }

    // function demo(){

    //     $users = User::all();
    //     return view('users', ['users' => $users]);
    // }

    // function login(Request $request){
    //     echo "Request method  ". $request->method();
    //     echo "<br>";

    //     echo "Request Path  ". $request->path();
    //     echo "<br>";

    //     echo "Request Url  ". $request->uri();
    //     echo "<br>";

    //     echo "Name is  ". $request->input('name');
    //     echo "<br>";

    //     echo "IP is  ". $request->ip();
    //     echo "<br>";

    //     print_r($request->input());
    //     echo "<br>";

    //     print_r($request->collect());
    // }
}   
