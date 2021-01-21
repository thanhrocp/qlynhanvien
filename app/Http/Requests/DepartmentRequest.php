<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Common\Exception\ValidationException;

class DepartmentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @param string $departmentId
     * @return array
     */
    public function rules(string $departmentId = null)
    {
        return [
            'depart_name'=>'required|max:191|unique:departments,depart_name,' . $departmentId . 'id',
            'depart_phone'=>'required|max:10'
        ];
    }

    /**
     * Check validator save request
     *
     * @param \Illuminate\Http\Request $request
     * @param string $departmentId
     * @return void
     */
    public function checkForSave(Request $request, string $departmentId = null)
    {
        $validator = Validator::make($request->except('_token'), $this->rules($departmentId));

        if ($validator->fails()) {
            throw new ValidationException($request, $validator);
        }
    }
}
