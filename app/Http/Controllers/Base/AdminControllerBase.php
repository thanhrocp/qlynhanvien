<?php

namespace App\Http\Controllers\Base;

use App\Http\Controllers\Controller;

class AdminControllerBase extends Controller
{
    /**
     * Get session
     *
     * @param string $key
     * @param  mixed  $default
     * @return mixed
     */
    public function getSession(string $key)
    {
        if ($key == '') {
            return session()->get(config('const.SYSTEM.SESSION_ADMIN_NAME'));
        }
        if (session()->has(config('const.SYSTEM.SESSION_ADMIN_NAME') . '.' . $key)) {
            return session()->get(config('const.SYSTEM.SESSION_ADMIN_NAME') . '.' . $key);
        } else {
            return false;
        }
    }

    /**
     * Save session
     *
     * @param string $key
     * @param mixed $value
     * @return void
     */
    public function setSession(string $key, $value)
    {
        session()->put(config('const.SYSTEM.SESSION_ADMIN_NAME') . '.' . $key, $value);
    }

    /**
     * Forget session
     *
     * @param string $key
     * @return void
     */
    public function forgetSession(string $key)
    {
        if ($key == '') {
            session()->forget(config('const.SYSTEM.SESSION_ADMIN_NAME'));
        } else {
            session()->forget(config('const.SYSTEM.SESSION_ADMIN_NAME') . '.' . $key);
        }
    }

    /**
     * Flush session
     *
     * @return void
     */
    public function flushSession()
    {
        session()->flush();
    }
}
