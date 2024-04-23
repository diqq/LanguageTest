<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Enroll;
use App\Models\toeic_answer;
use App\Models\TOEIC_Open;
use App\Models\TOEIC_Question;
use App\Models\TOEIC_Story;
use App\Models\ToeicQuestionAudio;
use App\Models\ToeicStoryAudio;
use Illuminate\Http\Request;

class ToeicAnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $enroll = Enroll::where('user_id', auth()->user()->id)->where('expired', 'no')->first();

        $updateStatus['status'] = 'working';
        $enroll->update($updateStatus);

        return view('examTOEIC/testTOEIC', [
            'profile' => User::where('id', auth()->user()->id)->first(),
            'enrolls' => $enroll,
            'toeicOpen' => TOEIC_Open::Where('status', 'run')->first(),
            'countPartI' => 1,
            'countPartII' => TOEIC_Question::where('exam_code', $enroll->exam_code)->where('section', 'i')->count(),
            'countPartIII' => TOEIC_Question::where('exam_code', $enroll->exam_code)->whereIn('section', ['i', 'ii'])->count(),
            'countPartIV' => TOEIC_Question::where('exam_code', $enroll->exam_code)->whereIn('section', ['i', 'ii', 'iii'])->count(),
            'countPartV' => TOEIC_Question::where('exam_code', $enroll->exam_code)->whereIn('section', ['i', 'ii', 'iii', 'iv'])->count(),
            'countPartVI' => TOEIC_Question::where('exam_code', $enroll->exam_code)->whereIn('section', ['i', 'ii', 'iii', 'iv', 'v'])->count(),
            'countPartVII' => TOEIC_Question::where('exam_code', $enroll->exam_code)->where('section', '!=', 'vii')->count(),
            'warningCard' => false,
            'result' => false,
            'category' => 'toeic',
            'title' => 'TOEIC Exam',
        ]);
    }

    public function fetchQuestionPlayButton(){
        $questionPlayButton = ToeicQuestionAudio::where('user_id', auth()->user()->id)->get();
        $questionAudio = TOEIC_Question::whereIn('section', ['i', 'ii', 'iii'])->get();

        return response()->json(['disabledButton' => $questionPlayButton, 'questionList' => $questionAudio]);
    }

    public function fetchStoryPlayButton(){
        $storyPlayButton = ToeicStoryAudio::where('user_id', auth()->user()->id)->get();
        $storyAudio = TOEIC_Story::where('section', 'iv')->get();

        return response()->json(['disabledButton' => $storyPlayButton, 'storyList' => $storyAudio]);
    }

    public function postQuestionPlayButton(Request $request, ToeicQuestionAudio $toeicQuestionAudio){
        $validateData = $request->validate([
            'status' => 'string',
            'question_id' => 'string',
        ]);

        $exist = ToeicQuestionAudio::where('user_id', auth()->user()->id)->where('question_id', $validateData['question_id'])->first();

        if(!$exist){
            $disablePlayButton = new ToeicQuestionAudio();
            $disablePlayButton->status = $validateData['status'];
            $disablePlayButton->question_id = $validateData['question_id'];
            $disablePlayButton->user()->associate(auth()->user()->id);
        }
        
        $disablePlayButton->save();

        return response()->json(['message' => 'Sukses disabled play question button']);
    }

    public function postStoryPlayButton(Request $request, ToeicStoryAudio $toeicStoryAudio){
        $validateData = $request->validate([
            'status' => 'string',
            'story_id' => 'string',
        ]);

        $exist = ToeicStoryAudio::where('user_id', auth()->user()->id)->where('story_id', $validateData['story_id'])->first();

        if(!$exist){
            $disablePlayButton = new ToeicStoryAudio();
            $disablePlayButton->status = $validateData['status'];
            $disablePlayButton->story_id = $validateData['story_id'];
            $disablePlayButton->user()->associate(auth()->user()->id);
        }
        
        $disablePlayButton->save();

        return response()->json(['message' => 'Sukses disabled play story button']);
    }

    public function fetchAnswer(){
        $answer = toeic_answer::where('user_id', auth()->user()->id)->get();

        return response()->json($answer);
    }

    public function postAnswer(Request $request, toeic_answer $toeic_answer){
        $validateData = $request->validate([
            'answer' => 'string',
            'question_id' => 'string',
        ]);

        $check = toeic_answer::where('user_id', auth()->user()->id)->where('question_id', $validateData['question_id'])->first();

        if($check){
            $check->update($validateData);
        }
        else{
            $answer = new toeic_answer();
            $answer->answer = $validateData['answer'];
            $answer->toeic_question()->associate($validateData['question_id']);
            $answer->user()->associate(auth()->user()->id);
        }
        
        $answer->save();

        return response()->json(['message' => 'Sukses menambah jawaban']);
    }

    public function fetchStatus()
    {
        $status = Enroll::where('user_id', auth()->user()->id)->where('for', 'toeic')->latest()->first();

        return response()->json($status);
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
    public function show(toeic_answer $toeic_answer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(toeic_answer $toeic_answer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, toeic_answer $toeic_answer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(toeic_answer $toeic_answer)
    {
        //
    }
}
