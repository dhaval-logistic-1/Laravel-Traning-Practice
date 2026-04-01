<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserValidate;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{


    public function index()
    {
        if(!Auth::user()){
            return redirect('/'); 
        }
        $users = User::paginate(10);
        return view('user_list', compact('users'));
    }

    public function create()
    {
        if(!Auth::user()){
            return redirect('/'); 
        }
        return view('user_create');
    }

    public function store(UserValidate $request)
    {
        if(!Auth::user()){
            return redirect('/'); 
        }

        

        $user = new User();

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->gender = $request->gender;
        $user->mo_no = $request->mo_no;

        $user->save();

        return redirect('user/list');
    }

    public function edit($id)
    {
        if(!Auth::user()){
            return redirect('/'); 
        }

        $user = User::find($id);

        return view('user_edit', compact('user'));
    }


    public function update(Request $request, $id)
    {
        if(!Auth::user()){
            return redirect('/'); 
        }

        $user = User::find($id);

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        // $user->email = $request->email;
        $user->gender = $request->gender;
        $user->mo_no = $request->mo_no;

        $user->save();
        return redirect('user/list');
    }


    public function delete($id)
    {
        if(!Auth::user()){
            return redirect('/'); 
        }

        User::where('id', $id)->delete();
        return redirect('user/list');
    }
}
