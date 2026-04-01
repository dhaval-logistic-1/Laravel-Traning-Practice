<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(Request $request){
        $email = $request->email;
        $password = $request->password;

        $user = User::where('email',$email)->first();

        if ($user) {
            
            $hashPassword = $user->password;
            if (Hash::check($password,$hashPassword)) {
                return view('welcome');
            } else {
               dd('Passworde Not Match');
            }
            
        } else {
           dd('User Not Found');
        }
        
    }
}
