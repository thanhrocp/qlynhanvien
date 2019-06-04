<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Rule;

class DepartRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'depart_name'=>'required|unique:departments,depart_name|max:191',
            'depart_phone'=>'required|max:11'
        ];
    }

    public function messages()
    {
        return [
            'depart_name.required'=>'Không được để trống',
            'depart_name.unique'=>'Tên đã bị trùng',
            'depart_name.max'=>'Tên quá dài',
            'depart_phone.required'=>'Không được để trống',
            'depart_phone.max'=>'Không được quá 11 số',
        ];
    }
}
