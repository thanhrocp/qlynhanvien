<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
            'user_id'=>'unique:employee,user_id',
            'first_name'=>'required|max:191',
            'last_name'=>'required|max:191',
        ];
    }
    public function messages()
    {
        return [
            'user_id.unique'=>'Tài khoản đã được nhập thông tin',
            'first_name.required'=>'Không được để trống',
            'first_name.max'=>'Họ và tên đệm Quá dài',
            'last_name.required'=>'Không được để trống',
        ];
    }
}
