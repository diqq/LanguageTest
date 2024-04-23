<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Enroll;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckBusy
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $checkBusy = Enroll::where('user_id', auth()->user()->id)->where('status', 'working')->first();

        if(!empty($checkBusy)){
            return redirect('/exam/' . $checkBusy->for . '/start');
        }

        return $next($request);
    }
}
