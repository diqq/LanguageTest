<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class BlockUpdateProfile
{
    public function handle(Request $request, Closure $next)
    {
        $id = auth()->user()->id;
        $role = auth()->user()->role;
        $check = User::where('id', $id)->firstOrFail();
        
        if (($check->picture) && ($role == 'test taker' || 'guest')) {
            return redirect('/dashboard');
        }
        else if($role == 'admin'){
            return redirect('/admin/dashboard');
        }

        return $next($request);
    }
}
