<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\EPT_Story;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EPT_StoryController extends Controller
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
        return view('admin/exam/ept/uploadStory', [
            'profile' => User::where('id', auth()->user()->id)->first(),
            'title' => 'Upload EPT Story',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if($request->file('story')){
            $validateData = $request->validate([
                'story' => 'file|mimes:mp3,ogg,wav,flac,aac',
                'section' => 'string',
            ]);
        }else{
            $validateData = $request->validate([
                'story' => 'string',
                'section' => 'string',
            ]);
        }
        
        $story = new EPT_Story;

        $story->exam()->associate(session('exam_code'));
        $story->code = 'STR-' . Str::random(10);
        if($request->file('story')){
            $fileName = $request->file('story')->getClientOriginalName();
            $fileName = time() . "_" . $fileName;
            $request->file('story')->storeAs('public/story', $fileName);
            $story->story = 'story/' . $fileName;
        }else{
            $story->story = $validateData['story'];
        }
        $story->section = $validateData['section'];

        $story->save();

        return redirect('/admin/dashboard/exam/' . session('id')  . '/edit')->with('success', 'Story created succesfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(EPT_Story $story)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $story = EPT_Story::where('id',$id)->first();

        return view('admin/exam/ept/updateStory', [
            'profile' => User::where('id', auth()->user()->id)->first(),
            'story' => $story,
            'title' => 'Update EPT Story',
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $story = EPT_Story::where('id',$id)->first();

        if($request->file('story')){
            $validateData = $request->validate([
                'story' => 'file|mimes:mp3,ogg,wav,flac,aac',
                'section' => 'string',
            ]);
            Storage::delete('public/' . $story->story);
            $fileName = $request->file('story')->getClientOriginalName();
            $fileName = time() . "_" . $fileName;
            $request->file('story')->storeAs('public/story', $fileName);
            $validateData['story'] = 'story/' . $fileName;
        }else{
            $validateData = $request->validate([
                'story' => 'string',
                'section' => 'string',
            ]);
        }

        $story->update($validateData);

        return redirect('/admin/dashboard/exam/' . session('id')  . '/edit')->with('success', 'Story updated succesfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $story = EPT_Story::where('id', $id)->first();
        $allowedExtensions = ['mp3', 'ogg', 'wav', 'flac', 'aac'];
        $isAudio = pathinfo($story->story, PATHINFO_EXTENSION) === $allowedExtensions;

        if($isAudio){
            Storage::delete('public/' . $story->story);
        }

        $story->delete();

        return redirect()->back()->with('success', 'Story deleted succesfully.');
    }
}
