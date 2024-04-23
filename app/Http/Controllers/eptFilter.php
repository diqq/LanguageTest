<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\ept_score;
use Illuminate\Http\Request;

class eptFilter extends Controller
{
    public function index(Request $request)
    {
        if($request->has('start_date') && $request->has('end_date')) {
            $startDate = Carbon::createFromFormat('m/d/Y', $request->start_date)->startOfDay();
            $endDate = Carbon::createFromFormat('m/d/Y', $request->end_date)->endOfDay();
        
            $scores = ept_score::whereBetween('created_at', [$startDate, $endDate])->get();
        }        
    
        return view('admin/reporting/eptReporting', [
            'profile' => User::where('id', auth()->user()->id)->first(),
            'eptScores' => $scores,
            'title' => 'EPT Reporting',
        ]);
    }
}
