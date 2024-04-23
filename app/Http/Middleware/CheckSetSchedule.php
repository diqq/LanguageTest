<?php

namespace App\Http\Middleware;

use App\Models\Enroll;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckSetSchedule
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $category): Response
    {
        $enroll = Enroll::where('user_id', auth()->user()->id)->where('for', $category)->whereIn('status', ['enrolled', 'working'])->latest()->first();

        if(empty($enroll)){
            return redirect('/dashboard/' . $category . '/waiting-area/schedule')->with('failed', "Please select your exam schedule first.");
        }

        return $next($request);
    }
}
