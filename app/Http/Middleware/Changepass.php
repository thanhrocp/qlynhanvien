<?php

namespace App\Http\Middleware;

use Closure;

use Auth;

use Illuminate\Support\Facades\Hash;

class Changepass
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // if (Auth::check() && Auth::user()->change_password == 1)
        // {
            return $next($request);
        // }
        // return redirect(route('changepass'));
    }
}
