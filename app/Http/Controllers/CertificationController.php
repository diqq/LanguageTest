<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CertificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.certification', [
            'profile' => User::where('id', auth()->user()->id)->first(),
            'title' => 'Certification',
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
        $extension = null;
        $extension2 = null;

        if ($request->hasFile('certificate_template')) {
            $extension = $request->file('certificate_template')->getClientOriginalExtension();
        }
        
        if ($request->hasFile('font')) {
            $extension2 = $request->file('font')->getClientOriginalExtension();
        }

        if ($request->template_category == 'ept') {
            if (!is_null($extension)) {
                if (Storage::exists('public/ept_certificate_template/certificate_template.png')) {
                    Storage::delete('public/ept_certificate_template/certificate_template.png');
                }

                $certificateTemplateName = 'ept_certificate_template.' . $extension;
                $request->file('certificate_template')->storeAs('public/ept_certificate_template', $certificateTemplateName);
            }

            if (!is_null($extension2)) {
                if (Storage::exists('public/ept_certificate_font/ept_certificate_font.ttf')) {
                    Storage::delete('public/ept_certificate_font/ept_certificate_font.ttf');
                }

                $certificateFontName = 'ept_certificate_font.' . $extension2;
                $request->file('font')->storeAs('public/ept_certificate_font', $certificateFontName);
            }
        } else {
            if (!is_null($extension)) {
                if (Storage::exists('public/toeic_certificate_template/certificate_template.png')) {
                    Storage::delete('public/toeic_certificate_template/certificate_template.png');
                }

                $certificateTemplateName = 'toeic_certificate_template.' . $extension;
                $request->file('certificate_template')->storeAs('public/toeic_certificate_template', $certificateTemplateName);
            }

            if (!is_null($extension2)) {
                if (Storage::exists('public/toeic_certificate_font/toeic_certificate_font.ttf')) {
                    Storage::delete('public/toeic_certificate_font/toeic_certificate_font.ttf');
                }

                $certificateFontName = 'toeic_certificate_font.' . $extension2;
                $request->file('font')->storeAs('public/toeic_certificate_font', $certificateFontName);
            }
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
