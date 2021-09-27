<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class teacherAuth
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
        else if(Auth::user()->role_id == 3)
        {
            return redirect('/home');
        }
        return $next($request);
    }
}
