<?php

namespace App\Http\Requests\admin\post;

use Illuminate\Foundation\Http\FormRequest;

class CreatedRequest extends FormRequest
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
            'title' => ['required', 'string'],
            'content' => ['required'],
            'slug' => ['required', 'string'],
            'introduction' => ['required', 'string'],
            'image' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute không được để trống',
            'string' => ':attribute phải là văn bản',
            'mimes' => ':attribute phải là kiểu jpeg,png,jpg',
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'Tiêu đề bài viết',
            'content' => 'Nội dung bài viết',
            'slug' => 'slug',
            'image' => 'Ảnh đại diện',
            'introduction' => 'Nội dung tóm tắt',
        ];
    }
}
