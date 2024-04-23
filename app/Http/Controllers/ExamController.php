<?php

namespace App\Http\Controllers;

use App\Models\EPT_Direction;
use App\Models\Exam;
use App\Models\User;
use App\Models\EPT_Question;
use App\Models\EPT_Story;
use App\Models\TOEIC_Direction;
use App\Models\TOEIC_Question;
use App\Models\TOEIC_Story;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ExamController extends Controller
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
        $validateData = $request->validate([
            'subname' => 'string',
            'category' => 'string',
        ]);

        $exam = new Exam;
        $exam->code = 'EXM-' . Str::random(10);
        $exam->category = $validateData['category'];
        $exam->title = $validateData['subname'];
        $exam->save();

        $examId = $exam->id;

        return redirect()->route('exam.edit', ['exam' => $examId])->with('success', 'Exam created successfully.');
    }

    public function updateActivated(Request $request, Exam $exam)
    {
        $activatedValue = $request->input('activated') ? 'yes' : 'no';

        $exam->update(['activated' => $activatedValue]);

        return response()->json(['message' => 'Activated Succesfully.', 'activated' => $activatedValue]);
    }

    public function fetchActivated()
    {
        $exam = Exam::all();

        return response()->json(['message' => 'Fetch Successfull', 'exams' =>$exam]);
    }
    /**
     * Display the specified resource.
     */
    public function show(Exam $exam)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Exam $exam)
    {
        session()->put('exam_code', $exam->code);
        session()->put('id', $exam->id);
        session()->put('category', $exam->category);

        if($exam->category == "ept"){
            return view('admin/exam/ept/createExam', [
                'profile' => User::where('id', auth()->user()->id)->first(),
                'directions_a' => EPT_Direction::where('exam_code', session('exam_code'))->where('section', 'part a')->first(),
                'directions_b' => EPT_Direction::where('exam_code', session('exam_code'))->where('section', 'part b')->first(),
                'directions_c' => EPT_Direction::where('exam_code', session('exam_code'))->where('section', 'part c')->first(),
                'directions_structure' => EPT_Direction::where('exam_code', session('exam_code'))->where('section', 'structure')->first(),
                'directions_written' => EPT_Direction::where('exam_code', session('exam_code'))->where('section', 'written')->first(),
                'directions_reading' => EPT_Direction::where('exam_code', session('exam_code'))->where('section', 'reading')->first(),
                'questions_a' => EPT_Question::where('exam_code', session('exam_code'))->where('section', 'part a')->get(),
                'questions_b' => EPT_Question::where('exam_code', session('exam_code'))->where('section', 'part b')->get(),
                'questions_c' => EPT_Question::where('exam_code', session('exam_code'))->where('section', 'part c')->get(),
                'questions_structure' => EPT_Question::where('exam_code', session('exam_code'))->where('section', 'structure')->get(),
                'questions_written' => EPT_Question::where('exam_code', session('exam_code'))->where('section', 'written')->get(),
                'questions_reading' => EPT_Question::where('exam_code', session('exam_code'))->where('section', 'reading')->get(),
                'exam' => $exam,
                'stories' => EPT_Story::where('exam_code', session('exam_code'))->get(),
                'countPartA' => 1,
                'countPartB' => EPT_Question::where('exam_code', session('exam_code'))->where('section', 'part a')->count(),
                'countPartC' => EPT_Question::where('exam_code', session('exam_code'))->whereIn('section', ['part a', 'part b'])->count(),
                'countStructure' => EPT_Question::where('exam_code', session('exam_code'))->whereIn('section', ['part a', 'part b', 'part c'])->count(),
                'countWritten' => EPT_Question::where('exam_code', session('exam_code'))->whereIn('section', ['part a', 'part b', 'part c', 'structure'])->count(),
                'countReading' => EPT_Question::where('exam_code', session('exam_code'))->where('section', '!=', 'reading')->count(),
                'question_count' => EPT_Question::query()->get()->count(),
                'title' => 'Create EPT',
            ]);
        }
        else if($exam->category == "toeic"){
            return view('admin/exam/toeic/createExam', [
                'profile' => User::where('id', auth()->user()->id)->first(),
                'directions_i' => TOEIC_Direction::where('exam_code', session('exam_code'))->where('section', 'i')->first(),
                'directions_ii' => TOEIC_Direction::where('exam_code', session('exam_code'))->where('section', 'ii')->first(),
                'directions_iii' => TOEIC_Direction::where('exam_code', session('exam_code'))->where('section', 'iii')->first(),
                'directions_iv' => TOEIC_Direction::where('exam_code', session('exam_code'))->where('section', 'iv')->first(),
                'directions_v' => TOEIC_Direction::where('exam_code', session('exam_code'))->where('section', 'v')->first(),
                'directions_vi' => TOEIC_Direction::where('exam_code', session('exam_code'))->where('section', 'vi')->first(),
                'directions_vii' => TOEIC_Direction::where('exam_code', session('exam_code'))->where('section', 'vii')->first(),
                'questions_i' => TOEIC_Question::where('exam_code', session('exam_code'))->where('section', 'i')->get(),
                'questions_ii' => TOEIC_Question::where('exam_code', session('exam_code'))->where('section', 'ii')->get(),
                'questions_iii' => TOEIC_Question::where('exam_code', session('exam_code'))->where('section', 'iii')->get(),
                'questions_iv' => TOEIC_Question::where('exam_code', session('exam_code'))->where('section', 'iv')->get(),
                'questions_v' => TOEIC_Question::where('exam_code', session('exam_code'))->where('section', 'v')->get(),
                'questions_vi' => TOEIC_Question::where('exam_code', session('exam_code'))->where('section', 'vi')->get(),
                'questions_vii' => TOEIC_Question::where('exam_code', session('exam_code'))->where('section', 'vii')->get(),
                'exam' => $exam,
                'stories' => TOEIC_Story::where('exam_code', session('exam_code'))->get(),
                'countPartI' => 1,
                'countPartII' => TOEIC_Question::where('exam_code', session('exam_code'))->where('section', 'i')->count(),
                'countPartIII' => TOEIC_Question::where('exam_code', session('exam_code'))->whereIn('section', ['i', 'ii'])->count(),
                'countPartIV' => TOEIC_Question::where('exam_code', session('exam_code'))->whereIn('section', ['i', 'ii', 'iii'])->count(),
                'countPartV' => TOEIC_Question::where('exam_code', session('exam_code'))->whereIn('section', ['i', 'ii', 'iii', 'iv'])->count(),
                'countPartVI' => TOEIC_Question::where('exam_code', session('exam_code'))->whereIn('section', ['i', 'ii', 'iii', 'iv', 'v'])->count(),
                'countPartVII' => TOEIC_Question::where('exam_code', session('exam_code'))->where('section', '!=', 'vii')->count(),
                'question_count' => TOEIC_Question::query()->get()->count(),
                'title' => 'Create TOEIC',
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Exam $exam)
    {
        $validateData = $request->validate([
            'title' => 'string',
            'first_date' => 'string',
            'second_date' => 'string',
            'third_date' => 'string',
            'hour_1' => 'string',
            'hour_2' => 'string',
            'hour_3' => 'string',
            'minute_1' => 'string',
            'minute_2' => 'string',
            'minute_3' => 'string',
            'conference_link' => 'string',
            'status' => 'string',
        ]);
        
        if($request->hour_1){
            $validateData['first_time'] = $validateData['hour_1'] . ':' . $validateData['minute_1'];
        }
        if($request->hour_2){
            $validateData['second_time'] = $validateData['hour_2'] . ':' . $validateData['minute_2'];
        }
        if($request->hour_3){
            $validateData['third_time'] = $validateData['hour_3'] . ':' . $validateData['minute_3'];
        }

        if($request->status){
            $exam->status = $validateData['status'];
        }

        $exam->update($validateData);

        return redirect()->back()->with('success', 'Exam updated succesfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Exam $exam)
    {
        if($exam->category == 'ept'){
            $exam->eptDirection()->delete();
            $exam->eptQuestion()->delete();
            $exam->eptStory()->delete();
        }
        else{
            $exam->toeicDirection()->delete();
            $exam->toeicQuestion()->delete();
            $exam->toeicStory()->delete();
        }
        $exam->delete();

        return redirect()->back()->with('success', 'Exam deleted succesfully.');
    }
}
