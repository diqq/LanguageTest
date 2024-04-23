<?php

namespace App\Http\Middleware;

use App\Models\EPT_Open;
use App\Models\TOEIC_Open;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckExamStarting
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $category): Response
    {
        if($category == 'ept'){
            $examStatus = EPT_Open::where('status', '!=', 'end')->latest()->first();

            if (!$examStatus || $examStatus->status === null) {
                return redirect('/dashboard/ept/waiting-area/enroll')->with('failed', 'EPT Exam has not started yet.');
            }
        }
        else{
            $examStatus = TOEIC_Open::where('status', '!=', 'end')->latest()->first();

            if (!$examStatus || $examStatus->status === null) {
                return redirect('/dashboard/toeic/waiting-area/enroll')->with('failed', 'TOEIC Exam has not started yet.');
            }
        }

        return $next($request);
    }
}
