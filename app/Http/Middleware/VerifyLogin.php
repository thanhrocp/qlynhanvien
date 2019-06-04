<?php

namespace App\Http\Middleware;

use Closure;

use Auth;

use Alert;

class VerifyLogin
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
        if(Auth::check())
        {
            $role = Auth::user();

            if( $role->role_id == 1 || $role->role_id == 2 || $role->role_id == 3 )
            {
                 return $next($request);
            }
            else
            {
                Alert::success('Bạn éo có quyền');

                return redirect()->route('formLogin');
            }
        }
        return redirect()->route('formLogin');
    }
}
