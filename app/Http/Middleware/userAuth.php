<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class userAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(!Auth::check())
        {
            return redirect('/login');
        }
        else if(Auth::user()->role_id == 1)
        {
            return redirect('/admin/home');
        }
        else if(Auth::user()->role_id == 2)
        {
            return redirect('/teacher/home');
        }
        return $next($request);
    }
}
