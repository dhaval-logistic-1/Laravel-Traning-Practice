<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use SebastianBergmann\Environment\Console;

class UserController extends Controller
{
    function login(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password , $user->password)) {
            return "Email and Password is not match";
        }else{

            $request->session()->put('user', $user);
            
            return redirect('/');
        }
        
    }
}
