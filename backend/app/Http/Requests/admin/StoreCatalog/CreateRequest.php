<?php

namespace App\Http\Requests\admin\StoreCatalog;

use Illuminate\Foundation\Http\FormRequest;

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
            'name' => 'required|unique:store_catalog',
            'slug' => 'required',
            // 'path' =>
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute không được để trống',
            'unique' => ':attribute đã tồn tại',
        ];
    }

    public function attributes ()
    {
        return [
            'required' => 'Tên danh mục',
            'slug' => 'Slug',
        ];
    }
}
