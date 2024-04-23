<?php

namespace App\Http\Controllers;

use App\Models\ept_score;
use App\Models\toeic_score;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    public function eptShow($score_code)
    {
        $certificate = ept_score::where('score_code', $score_code)->first();

        if (!$certificate) {
            return redirect('/dashboard');
        }

        return view('user/certificate', [
            'title' => 'Verify EPT Certificate',
            'category' => 'ept',
            'certificate' => $certificate,
        ]);
    }

    public function toeicShow($score_code)
    {
        $certificate = toeic_score::where('score_code', $score_code)->first();

        if (!$certificate) {
            return redirect('/dashboard');
        }

        return view('user/certificate', [
            'title' => 'Verify TOEIC Certificate',
            'category' => 'toeic',
            'certificate' => $certificate,
        ]);
    }
}
