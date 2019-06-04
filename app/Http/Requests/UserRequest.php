<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'email'=>'unique:users,email|email',
            'name'=>'required|min:6|max:191',
            'password'=>'required|min:6|max:191',
            'passwordagain'=>'required|same:password',
        ];
    }
    
    public function messages()
    {
        return [
            'email.unique'=>'Email đã bị trùng',
            'email.email'=>'Email chứa ký tự không hợp lệ',
            'name.required'=>'Tên không được để trống',
            'name.min'=>'Tên ít nhất 6 ký tự',
            'name.max'=>'Tên không được quá 191 ký tự',
            'password.required'=>'Mật khẩu không được để trống',
            'password.min'=>'Mật khẩu ít nhất 6 ký tự',
            'password.max'=>'Mật khẩu không được quá 191 ký tự',
            'passwordagain.required'=>'Mật khẩu không được để trống',
            'passwordagain.same'=>'Mật khẩu không khớp',
        ];
    }
}
