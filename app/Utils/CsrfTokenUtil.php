<?php

namespace App\Utils;

use Illuminate\Support\HtmlString;

class CsrfTokenUtil
{
    /**
     * Generate token
     *
     * @return \Illuminate\Support\HtmlString
     */
    public static function CsrfToken()
    {
        return new HtmlString('<input type="hidden" name="_token" value="'.csrf_token().'">');
    }
}
