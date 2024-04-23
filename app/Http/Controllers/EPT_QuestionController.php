<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\EPT_Story;
use App\Models\EPT_Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EPT_QuestionController extends Controller
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
        return view('admin/exam/ept/uploadQuestion', [
            'profile' => User::where('id', auth()->user()->id)->first(),
            'selects' => EPT_Story::where('exam_code', session('exam_code'))->get(),
            'title' => 'Upload EPT Question',
        ]);
    }

    public function getStory($section)
    {
        $selects = EPT_Story::where('exam_code', session('exam_code'))->where('section', $section)->get();
        
        return response()->json($selects);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if($request->file('question')){
            $validateData = $request->validate([
                'exam_code' => 'string',
                'story_code' => 'string',
                'question' => 'file|mimes:mp3,ogg,wav,flac,aac',
                'answer_a' => 'string',
                'answer_b' => 'string',
                'answer_c' => 'string',
                'answer_d' => 'string',
                'correct_answer' => 'string',
                'section' => 'string',
            ]);
        }else{
            $validateData = $request->validate([
                'exam_code' => 'string',
                'story_code' => 'string',
                'question' => 'string',
                'answer_a' => 'string',
                'answer_b' => 'string',
                'answer_c' => 'string',
                'answer_d' => 'string',
                'correct_answer' => 'string',
                'section' => 'string',
            ]);
        }

        $question = new EPT_Question;

        switch ($request->questionCase) {
            case '1':
                $question->exam()->associate(session('exam_code'));
                $fileName = $request->file('question')->getClientOriginalName();
                $fileName = time() . "_" . $fileName;
                $request->file('question')->storeAs('public/question', $fileName);
                $question->question = 'question/' . $fileName;
                $question->answer_a = $validateData['answer_a'];
                $question->answer_b = $validateData['answer_b'];
                $question->answer_c = $validateData['answer_c'];
                $question->answer_d = $validateData['answer_d'];
                $question->correct_answer = $validateData['correct_answer'];
                $question->section = 'part a';
            break;

            case '2':
                $question->exam()->associate(session('exam_code'));
                $question->story()->associate($validateData['story_code']);
                $fileName = $request->file('question')->getClientOriginalName();
                $fileName = time() . "_" . $fileName;
                $request->file('question')->storeAs('public/question', $fileName);
                $question->question = 'question/' . $fileName;
                $question->answer_a = $validateData['answer_a'];
                $question->answer_b = $validateData['answer_b'];
                $question->answer_c = $validateData['answer_c'];
                $question->answer_d = $validateData['answer_d'];
                $question->correct_answer = $validateData['correct_answer'];
                $question->section = 'part b';
            break;

            case '3':
                $question->exam()->associate(session('exam_code'));
                $question->story()->associate($validateData['story_code']);
                $fileName = $request->file('question')->getClientOriginalName();
                $fileName = time() . "_" . $fileName;
                $request->file('question')->storeAs('public/question', $fileName);
                $question->question = 'question/' . $fileName;
                $question->answer_a = $validateData['answer_a'];
                $question->answer_b = $validateData['answer_b'];
                $question->answer_c = $validateData['answer_c'];
                $question->answer_d = $validateData['answer_d'];
                $question->correct_answer = $validateData['correct_answer'];
                $question->section = 'part c';
            break;

            case '4':
                $question->exam()->associate(session('exam_code'));
                $question->question = $validateData['question'];
                $question->answer_a = $validateData['answer_a'];
                $question->answer_b = $validateData['answer_b'];
                $question->answer_c = $validateData['answer_c'];
                $question->answer_d = $validateData['answer_d'];
                $question->correct_answer = $validateData['correct_answer'];
                $question->section = 'structure';
            break;

            case '5':
                $question->exam()->associate(session('exam_code'));
                $question->question = $validateData['question'];
                $question->answer_a = $validateData['answer_a'];
                $question->answer_b = $validateData['answer_b'];
                $question->answer_c = $validateData['answer_c'];
                $question->answer_d = $validateData['answer_d'];
                $question->correct_answer = $validateData['correct_answer'];
                $question->section = 'written';
            break;

            case '6':
                $question->exam()->associate(session('exam_code'));
                $question->story()->associate($validateData['story_code']);
                $question->question = $validateData['question'];
                $question->answer_a = $validateData['answer_a'];
                $question->answer_b = $validateData['answer_b'];
                $question->answer_c = $validateData['answer_c'];
                $question->answer_d = $validateData['answer_d'];
                $question->correct_answer = $validateData['correct_answer'];
                $question->section = 'reading';
            break;
        }

        $question->save();

        return redirect('/admin/dashboard/exam/' . session('id')  . '/edit')->with('success', 'Question created succesfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(EPT_Question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EPT_Question $question)
    {
        return view('admin/exam/ept/updateQuestion', [
            'profile' => User::where('id', auth()->user()->id)->first(),
            'stories' => EPT_Story::where('exam_code', session('exam_code'))->get(),
            'questions' => $question,
            'title' => 'Update EPT Question',
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, EPT_Question $question)
    {
        if($request->file('question')){
            $validateData = $request->validate([
                'exam_code' => 'string',
                'story_code' => 'string',
                'question' => 'file|mimes:mp3,ogg,wav,flac,aac',
                'answer_a' => 'string',
                'answer_b' => 'string',
                'answer_c' => 'string',
                'answer_d' => 'string',
                'correct_answer' => 'string',
                'section' => 'string',
            ]);
        }else{
            $validateData = $request->validate([
                'exam_code' => 'string',
                'story_code' => 'string',
                'question' => 'string',
                'answer_a' => 'string',
                'answer_b' => 'string',
                'answer_c' => 'string',
                'answer_d' => 'string',
                'correct_answer' => 'string',
                'section' => 'string',
            ]);
        }

        if($request->file('question')){
            Storage::delete('public/' . $question->question);
        }

        switch ($request->questionCase) {
            case '1':
                $question->exam_code = session('exam_code');
                if($request->file('question')){
                    $fileName = $request->file('question')->getClientOriginalName();
                    $fileName = time() . "_" . $fileName;
                    $request->file('question')->storeAs('public/question', $fileName);
                    $question->question = 'question/' . $fileName;
                }
                $question->answer_a = $validateData['answer_a'];
                $question->answer_b = $validateData['answer_b'];
                $question->answer_c = $validateData['answer_c'];
                $question->answer_d = $validateData['answer_d'];
                $question->correct_answer = $validateData['correct_answer'];
                $question->section = 'part a';
            break;

            case '2':
                $question->exam_code = session('exam_code');
                $question->story_code = $validateData['story_code'];
                if($request->file('question')){
                    $fileName = $request->file('question')->getClientOriginalName();
                    $fileName = time() . "_" . $fileName;
                    $request->file('question')->storeAs('public/question', $fileName);
                    $question->question = 'question/' . $fileName;
                }
                $question->answer_a = $validateData['answer_a'];
                $question->answer_b = $validateData['answer_b'];
                $question->answer_c = $validateData['answer_c'];
                $question->answer_d = $validateData['answer_d'];
                $question->correct_answer = $validateData['correct_answer'];
                $question->section = 'part b';
            break;

            case '3':
                $question->exam_code = session('exam_code');
                $question->story_code = $validateData['story_code'];
                if($request->file('question')){
                    $fileName = $request->file('question')->getClientOriginalName();
                    $fileName = time() . "_" . $fileName;
                    $request->file('question')->storeAs('public/question', $fileName);
                    $question->question = 'question/' . $fileName;
                }
                $question->answer_a = $validateData['answer_a'];
                $question->answer_b = $validateData['answer_b'];
                $question->answer_c = $validateData['answer_c'];
                $question->answer_d = $validateData['answer_d'];
                $question->correct_answer = $validateData['correct_answer'];
                $question->section = 'part c';
            break;

            case '4':
                $question->exam_code = session('exam_code');
                $question->question = $validateData['question'];
                $question->answer_a = $validateData['answer_a'];
                $question->answer_b = $validateData['answer_b'];
                $question->answer_c = $validateData['answer_c'];
                $question->answer_d = $validateData['answer_d'];
                $question->correct_answer = $validateData['correct_answer'];
                $question->section = 'structure';
            break;

            case '5':
                $question->exam_code = session('exam_code');
                $question->question = $validateData['question'];
                $question->answer_a = $validateData['answer_a'];
                $question->answer_b = $validateData['answer_b'];
                $question->answer_c = $validateData['answer_c'];
                $question->answer_d = $validateData['answer_d'];
                $question->correct_answer = $validateData['correct_answer'];
                $question->section = 'written';
            break;

            case '6':
                $question->exam_code = session('exam_code');
                $question->story_code = $validateData['story_code'];
                $question->question = $validateData['question'];
                $question->answer_a = $validateData['answer_a'];
                $question->answer_b = $validateData['answer_b'];
                $question->answer_c = $validateData['answer_c'];
                $question->answer_d = $validateData['answer_d'];
                $question->correct_answer = $validateData['correct_answer'];
                $question->section = 'reading';
            break;
        }

        $question->update();

        return redirect('/admin/dashboard/exam/' . session('id')  . '/edit')->with('success', 'Question updated succesfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EPT_Question $question)
    {
        if($question->section == 'part a'|| 'part b' || 'part c'){
            Storage::delete('public/' . $question->question);
        };
        $question->delete();
        
        return redirect()->back()->with('success', 'Question deleted succesfully.');
    }
}
