<?php

namespace App\Http\Middleware;

use App\Models\Enroll;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetSchedule
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $category): Response
    {
        $enrolls = auth()->user()->enroll;
        
        if($enrolls){
            foreach($enrolls as $enroll){
                if($enroll->expired == 'no' && $enroll->for == $category){
                    return redirect('/dashboard/' . $enroll->for . '/waiting-area/enroll');
                }
            }
        }

        return $next($request);
    }
}
