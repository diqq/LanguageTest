<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\toeic_score;
use Illuminate\Http\Request;

class toeicFilter extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('start_date') && $request->has('end_date')) {
            $startDate = Carbon::createFromFormat('m/d/Y', $request->start_date)->startOfDay();
            $endDate = Carbon::createFromFormat('m/d/Y', $request->end_date)->endOfDay();
        
            $scores = toeic_score::whereBetween('created_at', [$startDate, $endDate])->get();
        }
    
        return view('admin/reporting/toeicReporting', [
            'profile' => User::where('id', auth()->user()->id)->first(),
            'toeicScores' => $scores,
            'title' => 'TOEIC Reporting',
        ]);
    }
}
