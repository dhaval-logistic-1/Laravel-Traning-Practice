<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::get();
        return view('welcome', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $file = $request->file('photo');

        // $fileName = time() . '_' . $file->getClientOriginalName();

        $path = $request->file('photo')->store('images', 'public');



        User::create([
            'file_name' => $path,
        ]);

        return redirect()->route('user.index')->with('status', 'User created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);
        return view('file_update', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);

        if ($request->hasFile('photo')) {

            $request->validate([
                'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $path = $request->file('photo')->store('image', 'public');

            $oldImagePath = public_path('storage/' . $user->file_name);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }

            $user->update([
                'file_name' => $path,
            ]);

            return redirect()->route('user.index')->with('status', 'Image updated successfully.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        $user->delete();

        $imagePath = public_path('images/' . $user->file_name);
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }

        return redirect()->route('user.index')->with('status', 'User deleted successfully.');
    }
}
