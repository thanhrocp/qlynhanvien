<?php

namespace App\Http\Controllers\Base;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class AdminControllerBase extends Controller
{
    /**
     * Get data from the session
     *
     * @param string $key
     * @param  mixed  $default
     * @return mixed
     */
    public function getSession(string $key, $default = null)
    {
        $value = Session::get($key, $default);
        return $value;
    }

    /**
     * Save to session
     *
     * @param string $key
     * @param mixed $formInput
     * @return mixed
     */
    public function setSession(string $key, $formInput)
    {
        $value = Session::put($key, $formInput);
        return $value;
    }

    /**
     * Forget to session
     *
     * @param string $key
     * @return void
     */
    public function forgetSession(string $key)
    {
        Session::forget($key);
    }

    /**
     * Flush to session
     *
     * @return void
     */
    public function flushSession()
    {
        Session::flush();
    }
}
