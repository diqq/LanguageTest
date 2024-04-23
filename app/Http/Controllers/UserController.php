<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('admin/updateUser',[
            'user' => User::where('id', $id)->first(),
            'profile' => User::where('id', auth()->user()->id)->first(),
            'title' => 'Update User',
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $user = User::where('id', $id)->first();
        $profile = $user->profile;

        $validateData = $request->validate([
            'name' => 'string',
            'npm' => 'string',
            'faculty' => 'string',
            'program_study' => 'string',
            'picture' => 'image | mimes: png,jpg,jpeg',
        ]);

        if($request->file('picture')){
            if($user->picture){
                Storage::delete('public/' . $user->picture);
            }
    
            $extension = $request->file('picture')->getClientOriginalExtension();
            $fileName = $request->file('picture')->getClientOriginalName();
            $fileName = $fileName . '_' . time() . '.' . $extension;
            $request->file('picture')->storeAs('public/profile_picture', $fileName);
            $validateData['picture'] = 'profile_picture/' . $fileName;
            $user->picture = 'profile_picture/' . $fileName;
        }

        $user->name = $validateData['name'];
        $profile->npm = $validateData['npm'];
        $profile->faculty = $validateData['faculty'];
        $profile->program_study = $validateData['program_study'];

        $user->save();
        $profile->save();

        return redirect()->back()->with('success', 'User updated succesfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::where('id', $id)->first();
        $profile = $user->profile;

        if($user->picture){
            Storage::delete('public/' . $user->picture);
        }

        $user->delete();
        $profile->delete();

        return redirect()->back()->with('success', 'User deleted succesfully.');
    }
}
