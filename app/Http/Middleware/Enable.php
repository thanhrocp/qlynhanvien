<?php

namespace App\Http\Middleware;

use Closure;

class Enable
{
    const ENABLE_ACCESS = 1;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param string $module
     * @param string $action
     * @return mixed
     */
    public function handle($request, Closure $next, string $module, string $action)
    {
        $auth = $request->session()->get('auth_role');
        if ($this->checkAuth($auth, $module, $action)) {
            return $next($request);
        }
        abort(403, 'Unauthorized action.');
    }

    /**
     * Handle an incoming request.
     *
     * @param array $permissions
     * @param string $module
     * @param string $action
     * @return boolean
     */
    public function checkAuth(array $auth, string $module, string $action)
    {
        if ($auth && count($auth)) {
            foreach ($auth as $au) {
                if ($au[$module][$action] === self::ENABLE_ACCESS) {
                    return true;
                }
                return false;
            }
        }
    }
}
