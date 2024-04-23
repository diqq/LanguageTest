<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('user/updateProfile', [
            'profile' => User::where('id', auth()->user()->id)->first(),
            'title' => 'Update Profile',
        ]);
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
        $validateData = $request->validate([
            'profile_registrant' => 'string',
            'picture' => 'image | mimes:png,jpeg,jpg',
            'profile_npm' =>  'string',
            'profile_faculty' => 'string',
            'profile_program_study' => 'string',
        ]);

        $newFaculty = Str::replace('_', ' ', $validateData['profile_faculty']);

        $profile = new Profile;
        $profile->registrant = $validateData['profile_registrant'];
        $profile->npm = $validateData['profile_npm'];
        $profile->faculty = $newFaculty;
        $profile->program_study = $validateData['profile_program_study'];
        $profile->user_id = auth()->user()->id;
        $profile->save();

        $user = User::where('id', auth()->user()->id)->first();
        $extension = $request->file('picture')->getClientOriginalExtension();
        $fileName = $request->file('picture')->getClientOriginalName();
        $fileName = $fileName . '_' . time() . '.' . $extension;
        $request->file('picture')->storeAs('public/profile_picture', $fileName);
        $user->picture = 'profile_picture/' . $fileName;
        if($profile->registrant == 'widyatama student'){
            $user->role = 'test taker';
        }
        else{
            $user->role = 'guest';
        }
        $user->update();

        return redirect('/dashboard')->with('success', 'Account created succesfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Profile $profile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Profile $profile)
    {
        $user = User::where('id', $profile->user_id)->first();

        $request->validate([
            'picture' => 'image | mimes: png,jpg,jpeg'
        ]);

        if($user->picture){
            Storage::delete('public/' . $user->picture);
        }

        $extension = $request->file('picture')->getClientOriginalExtension();
        $fileName = $request->file('picture')->getClientOriginalName();
        $fileName = $fileName . '_' . time() . '.' . $extension;
        $request->file('picture')->storeAs('public/profile_picture', $fileName);
        $user->picture = 'profile_picture/' . $fileName;
        $user->save();

        return redirect()->back()->with('success', 'Profile updated succesfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profile $profile)
    {
        //
    }
}
