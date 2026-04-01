<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        if (Auth::attempt(['email' => $email, 'password' => $password])) {

            $request->session()->regenerate();
            

            return redirect('user/list');
            
        }else{

            dd('credetial not match');

        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        
        return redirect('/');
    }
}
