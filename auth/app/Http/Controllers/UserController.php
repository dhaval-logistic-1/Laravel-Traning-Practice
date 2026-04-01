<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required|confirmed',
        ]);


        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'],
        ]);

        if ($user) {
            return redirect('/login')->with('success', 'Registration successful! Please log in.');
        } else {
            return back()->with('error', 'Registration failed. Please try again.');
        }
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);




        if (Auth::attempt($data)) {
            return redirect('/dashboard')->with('success', 'Login successful!');
        } else {
            return back()->with('error', 'Invalid email or password.');
        }
    }

    public function dashboardPage(Request $request)
    {
    
        if (Auth::check()) {
            return view('dashboard');
        } else {
            return redirect('/login')->with('error', 'Please log in first.');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login')->with('success', 'You have been logged out.');
    }

    


}
