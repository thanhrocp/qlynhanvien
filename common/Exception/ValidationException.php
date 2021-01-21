<?php

namespace Common\Exception;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;

class ValidationException extends Exception
{
    /**
     * Http request
     *
     * @var \Illuminate\Http\Request
     */
    protected $request;

    /**
     * Accuracy validator
     *
     * @var \Illuminate\Validation\Validator
     */
    protected $validator;

    /**
     * Initialization exception
     *
     * @param \Illuminate\Http\Request $request
     * @param \Illuminate\Validation\Validator $validator
     */
    public function __construct(Request $request, Validator $validator)
    {
        $this->request = $request;
        $this->validator = $validator;
    }

    /**
     * Report the exception.
     *
     * @return bool|void
     */
    public function report() {}

    /**
     * Render the exception into an HTTP response.
     *
     * @return \Illuminate\Http\Response
     */
    public function render()
    {
        return redirect()->back()->withErrors($this->validator)->withInput();
    }
}
