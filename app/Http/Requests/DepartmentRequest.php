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
            'department_name'=>'required|max:191|unique:departments,department_name,' . $departmentId . ',id',
            'department_phone'=>'required|digits:10|numeric',
            'department_number_person' => 'required|numeric|max:1000',
            'department_note' => 'max:5000',
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
        $validator = Validator::make($request->all(), $this->rules($departmentId));
        if ($validator->fails()) {
            throw new ValidationException($request, $validator);
        }
    }
}
