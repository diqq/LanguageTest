<?php

namespace App\Http\Controllers;

use App\Models\Enroll;
use App\Models\Exam;
use App\Models\User;
use App\Models\EPT_Open;
use App\Models\TOEIC_Open;
use Illuminate\Http\Request;

class Exam_OpenController extends Controller
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
        $eptOpen = EPT_Open::where('status', 'run')->orWhereNull('status')->first();
        
        if($eptOpen){
            $open = $eptOpen;
            $category = "ept";
        }
        else{
            $open = TOEIC_Open::where('status', 'run')->orWhereNull('status')->first();
            $category = "toeic";
        }

        return view('admin/examControl', [
            'profile' => User::where('id', auth()->user()->id)->first(),
            'examOpen' => $open,
            'category' => $category,
            'number' => 1,
            'title' => 'Exam Control',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'exam_code' => 'string',
            'date' => 'string',
            'time' => 'string',
        ]);

        if($request->category == 'ept'){
            $examExist = EPT_Open::where('exam_code', $request->exam_code)->where('status', 'run')->orWhereNull('status')->first();
            $examOpen = new EPT_Open();
        }
        else{
            $examExist = TOEIC_Open::where('exam_code', $request->exam_code)->where('status', 'run')->orWhereNull('status')->first();
            $examOpen = new TOEIC_Open();
        }
    
        if(!$examExist){
            $examOpen->fill($validateData);
            $examOpen->save();
        }

        return redirect('/admin/dashboard/exam/control/create');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        if($request->category == 'ept'){
            $examOpen = EPT_Open::where('id', $id)->first();
        }
        else{
            $examOpen = TOEIC_Open::where('id', $id)->first();
        }

        $validateData = $request->validate([
            'status' => 'string'
        ]);

        $examOpen->update($validateData);

        if($validateData['status'] == 'end'){
            foreach($examOpen->exam->enroll as $enroll){
                $enrollBehaviour = $enroll->user->ept_score()->latest()->first();
                $enroll->expired = 'yes';
                $enroll->user->payment->used = 'yes';
                switch ($enroll->status) {
                    case 'enrolled':
                        $enrollBehaviour->update(['behaviour' => 'closed']);
                    break;

                    case 'working':
                        $enrollBehaviour->update(['behaviour' => 'times']);
                    break;

                    case 'finish':
                        $enrollBehaviour->update(['behaviour' => 'good']);
                    break;
                    
                    case 'kick':
                        $enrollBehaviour->update(['behaviour' => 'kick']);
                    break;
                    
                    case 'out':
                        $enrollBehaviour->update(['behaviour' => 'out']);
                    break;

                    case 'closed':
                        $enrollBehaviour->update(['behaviour' => 'closed']);
                    break;

                    default:
                        $enrollBehaviour->update(['behaviour' => 'good']);
                    break;
                }

                $enroll->update(['expired' => 'yes']);

                foreach($enroll->user->payment as $payment){
                    $payment->update(['used' => 'yes']);
                }
            }
        }
        
        if($validateData['status'] == 'run'){
            return redirect()->back();
        }
        else{
            return redirect('/admin/dashboard');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Exam $exam)
    {
        //
    }

    public function startExam(Request $request){
        if($request->category == 'ept'){
            $exam = EPT_Open::findOrFail($request->exam_id);
        } else {
            $exam = TOEIC_Open::findOrFail($request->exam_id);
        }
    
        $exam->start = now();
        $exam->save();
    
        $response = [
            'duration' => $exam->duration,
            'id' => $exam->id,
            'category' => $request->category,
            'message' => 'berjalan',
        ];
    
        // Return JSON response
        return response()->json($response);
    }
    
    public function timer(Request $request){
        if($request->category == 'ept'){
            $exam = EPT_Open::where('id',$request->id)->first();
        } else {
            $exam = TOEIC_Open::where('id',$request->id)->first();
        }
        return response()->json([
            'start_time' => $exam->start,
            'duration' => '7290'
        ]);
    }
}
