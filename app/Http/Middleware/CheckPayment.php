<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\payment;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckPayment
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $category): Response
    {
        $payment = payment::where('user_id', auth()->user()->id)->where('for', $category)->where('used', 'no')->latest()->first();

        if(empty($payment)){
            return redirect('/dashboard')->with('failed', "You haven't made the " . strtoupper($category) . " payment.");
        }
        
        return $next($request);
    }
}
