<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\TOEIC_Story;
use Illuminate\Http\Request;
use App\Models\TOEIC_Question;
use Illuminate\Support\Facades\Storage;

class TOEIC_QuestionController extends Controller
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
        return view('admin/exam/toeic/uploadQuestion', [
            'profile' => User::where('id', auth()->user()->id)->first(),
            'title' => 'Upload TOEIC Question',
        ]);
    }

    public function getStory($section)
    {
        $selects = TOEIC_Story::where('exam_code', session('exam_code'))->where('section', $section)->get();
        return response()->json($selects);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData  = $request->validate([
            'photograph' => 'image|mimes:jpg,jpeg,png',
            'audio' => 'file|mimes:mp3,ogg,wav,flac,aac',
            'story_code' => 'string',
            'question' => 'string',
            'answer_a' => 'string',
            'answer_b' => 'string',
            'answer_c' => 'string',
            'answer_d' => 'string',
            'correct_answer' => 'string',
            'section' => 'string',
        ]);

        $question = new TOEIC_Question();

        switch($request->questionCase){
            case '1':
                $question->exam_code = session('exam_code');
                $filePhotograph = $request->file('photograph')->getClientOriginalName();
                $filePhotograph = time() . "_" . $filePhotograph;
                $request->file('photograph')->storeAs('public/photograph', $filePhotograph);
                $question->photograph = 'photograph/' . $filePhotograph;
                $fileAudio = $request->file('audio')->getClientOriginalName();
                $fileAudio = time() . "_" . $fileAudio;
                $request->file('audio')->storeAs('public/audio', $fileAudio);
                $question->audio = 'audio/' . $fileAudio;
                $question->answer_a = $validateData['answer_a'];
                $question->answer_b = $validateData['answer_b'];
                $question->answer_c = $validateData['answer_c'];
                $question->answer_d = $validateData['answer_d'];
                $question->correct_answer = $validateData['correct_answer'];
                $question->section = 'i';
            break;

            case '2':
                $question->exam_code = session('exam_code');
                $fileAudio = $request->file('audio')->getClientOriginalName();
                $fileAudio = time() . "_" . $fileAudio;
                $request->file('audio')->storeAs('public/audio', $fileAudio);
                $question->audio = 'audio/' . $fileAudio;
                $question->answer_a = $validateData['answer_a'];
                $question->answer_b = $validateData['answer_b'];
                $question->answer_c = $validateData['answer_c'];
                $question->correct_answer = $validateData['correct_answer'];
                $question->section = 'ii';
            break;

            case '3':
                $question->exam_code = session('exam_code');
                $fileAudio = $request->file('audio')->getClientOriginalName();
                $fileAudio = time() . "_" . $fileAudio;
                $request->file('audio')->storeAs('public/audio', $fileAudio);
                $question->audio = 'audio/' . $fileAudio;
                $question->question = $validateData['question'];
                $question->answer_a = $validateData['answer_a'];
                $question->answer_b = $validateData['answer_b'];
                $question->answer_c = $validateData['answer_c'];
                $question->answer_d = $validateData['answer_d'];
                $question->correct_answer = $validateData['correct_answer'];
                $question->section = 'iii';
            break;

            case '4':
                $question->exam_code = session('exam_code');
                $question->story()->associate($validateData['story_code']);
                $question->story_code = $validateData['story_code'];
                $question->question = $validateData['question'];
                $question->answer_a = $validateData['answer_a'];
                $question->answer_b = $validateData['answer_b'];
                $question->answer_c = $validateData['answer_c'];
                $question->answer_d = $validateData['answer_d'];
                $question->correct_answer = $validateData['correct_answer'];
                $question->section = 'iv';
            break;

            case '5':
                $question->exam_code = session('exam_code');
                $question->question = $validateData['question'];
                $question->answer_a = $validateData['answer_a'];
                $question->answer_b = $validateData['answer_b'];
                $question->answer_c = $validateData['answer_c'];
                $question->answer_d = $validateData['answer_d'];
                $question->correct_answer = $validateData['correct_answer'];
                $question->section = 'v';
            break;

            case '6':
                $question->exam_code = session('exam_code');
                $question->question = $validateData['question'];
                $question->answer_a = $validateData['answer_a'];
                $question->answer_b = $validateData['answer_b'];
                $question->answer_c = $validateData['answer_c'];
                $question->answer_d = $validateData['answer_d'];
                $question->correct_answer = $validateData['correct_answer'];
                $question->section = 'vi';
            break;

            case '7':
                $question->exam_code = session('exam_code');
                $question->story()->associate($validateData['story_code']);
                $question->question = $validateData['question'];
                $question->answer_a = $validateData['answer_a'];
                $question->answer_b = $validateData['answer_b'];
                $question->answer_c = $validateData['answer_c'];
                $question->answer_d = $validateData['answer_d'];
                $question->correct_answer = $validateData['correct_answer'];
                $question->section = 'vii';
            break;
        }

        $question->save();

        return redirect('/admin/dashboard/exam/' . session('id')  . '/edit')->with('success', 'Question created succesfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(TOEIC_Question $tOEIC_Question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $question = TOEIC_Question::where('id',$id)->first();

        return view('admin/exam/toeic/updateQuestion', [
            'profile' => User::where('id', auth()->user()->id)->first(),
            'stories' => TOEIC_Story::where('exam_code', session('exam_code'))->get(),
            'questions' => $question,
            'title' => 'Update TOEIC Question',
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $question = TOEIC_Question::where('id',$id)->first();

        $validateData  = $request->validate([
            'photograph' => 'image|mimes:jpg,jpeg,png',
            'audio' => 'file|mimes:mp3,ogg,wav,flac,aac',
            'story_code' => 'string',
            'question' => 'string',
            'answer_a' => 'string',
            'answer_b' => 'string',
            'answer_c' => 'string',
            'answer_d' => 'string',
            'correct_answer' => 'string',
            'section' => 'string',
        ]);

        if($request->file('photograph')){
            Storage::delete('public/' . $question->photograph);
        }

        if($request->file('audio')){
            Storage::delete('public/' . $question->audio);
        }

        switch($request->questionCase){
            case '1':
                $question->exam()->associate(session('exam_code'));
                if($request->file('photograph')){
                    $filePhotograph = $request->file('photograph')->getClientOriginalName();
                    $filePhotograph = time() . "_" . $filePhotograph;
                    $request->file('photograph')->storeAs('public/photograph', $filePhotograph);
                    $question->photograph = 'photograph/' . $filePhotograph;
                }
                if($request->file('audio')){
                    $fileAudio = $request->file('audio')->getClientOriginalName();
                    $fileAudio = time() . "_" . $fileAudio;
                    $request->file('audio')->storeAs('public/audio', $fileAudio);
                    $question->audio = 'audio/' . $fileAudio;
                }
                $question->answer_a = $validateData['answer_a'];
                $question->answer_b = $validateData['answer_b'];
                $question->answer_c = $validateData['answer_c'];
                $question->answer_d = $validateData['answer_d'];
                $question->correct_answer = $validateData['correct_answer'];
                $question->section = 'i';
            break;

            case '2':
                $question->exam()->associate(session('exam_code'));
                if($request->file('audio')){
                    $fileAudio = $request->file('audio')->getClientOriginalName();
                    $fileAudio = time() . "_" . $fileAudio;
                    $request->file('audio')->storeAs('public/audio', $fileAudio);
                    $question->audio = 'audio/' . $fileAudio;
                }
                $question->answer_a = $validateData['answer_a'];
                $question->answer_b = $validateData['answer_b'];
                $question->answer_c = $validateData['answer_c'];
                $question->correct_answer = $validateData['correct_answer'];
                $question->section = 'ii';
            break;

            case '3':
                $question->exam()->associate(session('exam_code'));
                if($request->file('audio')){
                    $fileAudio = $request->file('audio')->getClientOriginalName();
                    $fileAudio = time() . "_" . $fileAudio;
                    $request->file('audio')->storeAs('public/audio', $fileAudio);
                    $question->audio = 'audio/' . $fileAudio;
                }
                $question->question = $validateData['question'];
                $question->answer_a = $validateData['answer_a'];
                $question->answer_b = $validateData['answer_b'];
                $question->answer_c = $validateData['answer_c'];
                $question->answer_d = $validateData['answer_d'];
                $question->correct_answer = $validateData['correct_answer'];
                $question->section = 'iii';
            break;

            case '4':
                $question->exam()->associate(session('exam_code'));
                $question->story()->associate($validateData['story_code']);
                $question->story_code = $validateData['story_code'];
                $question->question = $validateData['question'];
                $question->answer_a = $validateData['answer_a'];
                $question->answer_b = $validateData['answer_b'];
                $question->answer_c = $validateData['answer_c'];
                $question->answer_d = $validateData['answer_d'];
                $question->correct_answer = $validateData['correct_answer'];
                $question->section = 'iv';
            break;

            case '5':
                $question->exam()->associate(session('exam_code'));
                $question->question = $validateData['question'];
                $question->answer_a = $validateData['answer_a'];
                $question->answer_b = $validateData['answer_b'];
                $question->answer_c = $validateData['answer_c'];
                $question->answer_d = $validateData['answer_d'];
                $question->correct_answer = $validateData['correct_answer'];
                $question->section = 'v';
            break;

            case '6':
                $question->exam()->associate(session('exam_code'));
                $question->question = $validateData['question'];
                $question->answer_a = $validateData['answer_a'];
                $question->answer_b = $validateData['answer_b'];
                $question->answer_c = $validateData['answer_c'];
                $question->answer_d = $validateData['answer_d'];
                $question->correct_answer = $validateData['correct_answer'];
                $question->section = 'vi';
            break;

            case '7':
                $question->exam()->associate(session('exam_code'));
                $question->story()->associate($validateData['story_code']);
                $question->question = $validateData['question'];
                $question->answer_a = $validateData['answer_a'];
                $question->answer_b = $validateData['answer_b'];
                $question->answer_c = $validateData['answer_c'];
                $question->answer_d = $validateData['answer_d'];
                $question->correct_answer = $validateData['correct_answer'];
                $question->section = 'vii';
            break;
        }

        $question->update();

        return redirect('/admin/dashboard/exam/' . session('id')  . '/edit')->with('success', 'Question updated succesfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $question = TOEIC_Question::where('id',$id)->first();

        if($question->photograph){
            Storage::delete('public/' . $question->photograph);
        }
        if($question->audio){
            Storage::delete('public/' . $question->audio);
        }

        $question->delete();
        
        return redirect()->back()->with('success', 'Question deleted succesfully.');
    }
}
