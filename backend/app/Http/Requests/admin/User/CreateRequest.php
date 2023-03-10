<?php

namespace App\Http\Requests\admin\User;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Validation\Rule;

class CreateRequest extends FormRequest
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
            'name' => [
                'required',
                'string',
                'min:6',
                'max:255',
            ],

            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users')->ignore($this->id, 'id'),
            ],

            'phone' => [
                'required',
                'regex:/^(0?)(3[2-9]|5[6|8|9]|7[0|6-9]|8[0-6|8|9]|9[0-4|6-9])[0-9]{7}$/',
                // 'unique:users',
                Rule::unique('users')->ignore($this->id, 'id'),
            ],

            'position_id' => 'required',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute không được để trống',
            'string' => ':attribute phải là ký tự',
            'unique' => ':attribute đã tồn tại',
            'email' => ':attribute không đúng địng dạng',
            'string' => ':attribute không đúng địng dạng',
            'regex' => ':attribute không đúng định dạng',
            'max' => ':attribute không được quá :max ký tự',
            'min' => ':attribute phải lớn hơn :min ký tự',
            'confirmed' => ':attribute không trùng khớp',
        ];
    }

    public function attributes()
    {
        return [
            'username' => 'Tài khoản đăng nhập',
            'email' => 'Email',
            'phone' => 'Số điện thoại',
            'position_id' => 'Chức danh',
            'password' => 'Mật khẩu',
            'password_confirmation' => 'Mật khẩu nhập lại',
        ];
    }
}
