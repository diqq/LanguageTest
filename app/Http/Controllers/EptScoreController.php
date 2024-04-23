<?php

namespace App\Http\Controllers;

use App\Models\Enroll;
use App\Models\User;
use App\Models\ept_score;
use App\Models\ept_answer;
use App\Models\ept_converted;
use App\Models\EPT_Question;
use App\Models\payment;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class EptScoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('user/exam/examFinish', [
            'profile' => User::where('id', auth()->user()->id)->first(),
            'scores' => ept_score::where('user_id', auth()->user()->id)->latest()->first(),
            'countFirstSection' => EPT_Question::whereIn('section', ['part a', 'part b', 'part c'])->count(),
            'countSecondSection' => EPT_Question::whereIn('section', ['structure', 'written'])->count(),
            'countThirdSection' => EPT_Question::whereIn('section', ['reading'])->count(),
            'warningCard' => false,
            'result' => true,
            'category' => 'ept',
            'title' => 'EPT Result'
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
        $userAnswers = ept_answer::where('user_id', auth()->user()->id)->get();
        $enrollStatus = Enroll::where('user_id', auth()->user()->id)->latest()->first();
        $payment = payment::where('user_id', auth()->user()->id)->latest()->first();

        $eptScore = new ept_score();
        $eptScore->user()->associate(auth()->user()->id);
        $eptScore->order_id = $payment->order_id;
        $eptScore->score_code = 'SCR-' . Str::random(10);
        
        $updateBehaviour['status'] = 'finish';
        $enrollStatus->update($updateBehaviour);

        $correctCounts = [
            'first' => 0,
            'second' => 0,
            'third' => 0,
        ];

        foreach ($userAnswers as $userAnswer) {
            if ($userAnswer->answer == $userAnswer->ept_question->correct_answer) {
                $section = $userAnswer->ept_question->section;
                switch ($section) {
                    case 'part a':
                    case 'part b':
                    case 'part c':
                        $correctCounts['first']++;
                        break;
                    case 'structure':
                    case 'written':
                        $correctCounts['second']++;
                        break;
                    default:
                        $correctCounts['third']++;
                        break;
                }
            }
        }

        $eptScore->correct_first_section = $correctCounts['first'];
        $eptScore->correct_second_section = $correctCounts['second'];
        $eptScore->correct_third_section = $correctCounts['third'];

        $scoreConvertFirstSection = ept_converted::where('correct_amount', $correctCounts['first'])->first();
        $scoreConvertSecondSection = ept_converted::where('correct_amount', $correctCounts['second'])->first();
        $scoreConvertThirdSection = ept_converted::where('correct_amount', $correctCounts['third'])->first();

        $eptScore->score_first_section = $scoreConvertFirstSection->first_section;
        $eptScore->score_second_section = $scoreConvertSecondSection->second_section;
        $eptScore->score_third_section = $scoreConvertThirdSection->third_section;

        $eptScore->score_total = $scoreConvertFirstSection->first_section + $scoreConvertSecondSection->second_section + $scoreConvertThirdSection->third_section;

        $eptScore->status = 'keep';

        $eptScore->save();

        foreach ($userAnswers as $userAnswer) {
            $userAnswer->delete();
        }

        return redirect('exam/ept/result');
    }

    /**
     * Display the specified resource.
     */
    public function show(ept_score $ept_score)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ept_score $ept_score)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ept_score $ept_score)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ept_score $ept_score)
    {
        //
    }
}
