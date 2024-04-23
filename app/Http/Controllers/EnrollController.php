<?php

namespace App\Http\Controllers;

use App\Models\Enroll;
use App\Models\EPT_Open;
use App\Models\TOEIC_Open;
use Illuminate\Http\Request;

class EnrollController extends Controller
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
            'exam_code' => 'string',
            'for' => 'string',
            'date' => 'string',
            'time' => 'string',
            'status' => 'string',
        ]);

        $preventKicked = Enroll::where('user_id', auth()->user()->id)->where('exam_code', $validateData['exam_code'])->latest()->first();
        
        if($validateData['for'] == 'ept'){
            $examEnd = EPT_Open::where('exam_code', $validateData['exam_code'])->where('date', $validateData['date'])->where('time', $validateData['time'])->latest()->first();
        }
        else{
            $examEnd = TOEIC_Open::where('exam_code', $validateData['exam_code'])->where('date', $validateData['date'])->where('time', $validateData['time'])->latest()->first();
        }

        if($examEnd){
            if($examEnd->status == 'end' || $examEnd->status == 'run'){
                return redirect()->back();
            }
            else{
                $enroll = new Enroll();
    
                $enroll->user()->associate(auth()->user()->id);
                $enroll->exam()->associate($validateData['exam_code']);
                $validateData['expired'] = 'no';
                $enroll->fill($validateData);
    
                $enroll->save();
    
                return redirect('/dashboard/' . $validateData['for'] . '/waiting-area/enroll')->with('success', 'Exam have been enrolled succesfully.');
            }
        }

        return redirect()->back();
    }

    public function getButton()
    {
        $eptOpen = EPT_Open::where('status', 'run')->orWhereNull('status')->first();
        
        if($eptOpen){
            $open = $eptOpen;
        }
        else{
            $open = TOEIC_Open::where('status', 'run')->orWhereNull('status')->first();
        }

        return response()->json($open);
    }

    /**
     * Display the specified resource.
     */
    public function show(Enroll $enroll)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Enroll $enroll)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $enroll = Enroll::where('id', $id)->first();
        
        $validateData = $request->validate([
            'status' => 'string',
            'expired' => 'string'
        ]);

        $enroll->update($validateData);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Enroll $enroll)
    {
        //
    }
}
