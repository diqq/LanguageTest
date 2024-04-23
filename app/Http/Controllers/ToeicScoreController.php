<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Enroll;
use App\Models\payment;
use App\Models\toeic_score;
use Illuminate\Support\Str;
use App\Models\toeic_answer;
use Illuminate\Http\Request;
use App\Models\TOEIC_Question;
use App\Models\toeic_converted;

class ToeicScoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $scores = toeic_score::where('user_id', auth()->user()->id)->latest()->first();
        $countPartI = TOEIC_Question::where('section', 'i')->count();
        $countPartII = TOEIC_Question::where('section', 'ii')->count();
        $countPartIII = TOEIC_Question::where('section', 'iii')->count();
        $countPartIV = TOEIC_Question::where('section', 'iv')->count();
        $countPartV = TOEIC_Question::where('section', 'v')->count();
        $countPartVI = TOEIC_Question::where('section', 'vi')->count();
        $countPartVII = TOEIC_Question::where('section', 'vii')->count();

        $correctListening = $scores->correct_part_i + $scores->correct_part_ii + $scores->correct_part_iii + $scores->correct_part_iv;
        $correctReading = $scores->correct_part_v + $scores->correct_part_vi + $scores->correct_part_vii;

        $incorrectListening = ($countPartI + $countPartII + $countPartIII + $countPartIV)- ($scores->correct_part_i + $scores->correct_part_ii + $scores->correct_part_iii + $scores->correct_part_iv);
        $incorrectReading = ($countPartV + $countPartVI + $countPartVII) - ($scores->correct_part_v + $scores->correct_part_vi + $scores->correct_part_vii);

        return view('user/exam/examFinish', [
            'profile' => User::where('id', auth()->user()->id)->first(),
            'scores' => $scores,
            'correctListening' => $correctListening,
            'incorrectListening' => $incorrectListening,
            'correctReading' => $correctReading,
            'incorrectReading' => $incorrectReading,
            'warningCard' => false,
            'result' => true,
            'category' => 'toeic',
            'title' => 'TOEIC Result',
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
        $userAnswers = toeic_answer::where('user_id', auth()->user()->id)->get();
        $enrollBehaviour = Enroll::where('user_id', auth()->user()->id)->latest()->first();
        $payment = payment::where('user_id', auth()->user()->id)->latest()->first();

        $toeicScore = new toeic_score();
        $toeicScore->user()->associate(auth()->user()->id);
        $toeicScore->order_id = $payment->order_id;
        $toeicScore->score_code = 'SCR-' . Str::random(10);

        $updateBehaviour['status'] = 'finish';
        $enrollBehaviour->update($updateBehaviour);

        $correctCounts = [
            'i' => 0,
            'ii' => 0,
            'iii' => 0,
            'iv' => 0,
            'v' => 0,
            'vi' => 0,
            'vii' => 0,
        ];

        foreach ($userAnswers as $userAnswer) {
            if ($userAnswer->answer == $userAnswer->toeic_question->correct_answer) {
                $section = $userAnswer->toeic_question->section;
                if (array_key_exists($section, $correctCounts)) {
                    $correctCounts[$section]++;
                } else {
                    $correctCounts['vii']++;
                }
            }
        }

        $toeicScore->correct_part_i = $correctCounts['i'];
        $toeicScore->correct_part_ii = $correctCounts['ii'];
        $toeicScore->correct_part_iii = $correctCounts['iii'];
        $toeicScore->correct_part_iv = $correctCounts['iv'];
        $toeicScore->correct_part_v = $correctCounts['v'];
        $toeicScore->correct_part_vi = $correctCounts['vi'];
        $toeicScore->correct_part_vii = $correctCounts['vii'];

        $totalCorrectListening = $correctCounts['i'] + $correctCounts['ii'] + $correctCounts['iii'] + $correctCounts['iv'];
        $totalCorrectReading = $correctCounts['v'] + $correctCounts['vi'] + $correctCounts['vii'];

        $scoreConvertListening = toeic_converted::where('correct_amount', $totalCorrectListening)->first();
        $scoreConvertReading = toeic_converted::where('correct_amount', $totalCorrectReading)->first();

        $toeicScore->score_listening = $scoreConvertListening->listening;
        $toeicScore->score_reading = $scoreConvertReading->reading;

        $toeicScore->score_total = $scoreConvertListening->listening + $scoreConvertReading->reading;

        $toeicScore->status = 'keep';

        $toeicScore->save();

        foreach ($userAnswers as $userAnswer) {
            $userAnswer->delete();
        }

        return redirect('exam/toeic/result');
    }

    /**
     * Display the specified resource.
     */
    public function show(toeic_score $toeic_score)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(toeic_score $toeic_score)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, toeic_score $toeic_score)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(toeic_score $toeic_score)
    {
        //
    }
}
