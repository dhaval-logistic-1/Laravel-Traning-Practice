<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $admin = Admin::where('frist_name' , 'dhaval')->get();

        $admin = Admin::get();

        // dd($admin->toArray());

        return view('admin_list', compact('admin'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $data = [
        //     "frist_name"=>"Dhaval",
        //     "last_name"=>"Parmar",
        //     "email"=>"dhaval1@gmail.com",
        //     "gender"=>"male",
        //     "is_active"=>0,
        // ];  

        // Admin::create($data);

        $admin = new Admin();
        $admin->frist_name = "sageet";
        $admin->last_name = "tugtug sahur";
        $admin->email = "sageet@gmail.com";
        $admin->gender = "male";
        $admin->is_active = 0;

        $admin->save();

        dd("Admin created successfully");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $admin = Admin::find($id);
        dd($admin->toArray());
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        // $data = [
        //     "frist_name"=>"Dhaval",
        // ];  

        // Admin::where('id',$id)->update($data);

        // $admin = Admin::Where('id',$id)->first();

        $admin = Admin::find($id);

        // dd($admin->toArray());
        $admin->frist_name = "Chuemue";
        $admin->last_name = "tugtug sahur";
        $admin->email = "chuemue@gmail.com";
        $admin->gender = "female";
        $admin->is_active = 1;

        $admin->save();

        dd("update Successfully");
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $admin = Admin::find($id);
        $admin->delete();
        dd("Admin Deleted Successfully");
    }
}
