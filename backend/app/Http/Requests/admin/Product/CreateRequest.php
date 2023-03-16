<?php

namespace App\Http\Requests\admin\Product;

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
            'name' => 'required',
            'title' => 'required',
            'introduction' => 'required',
            'category' => 'required',
            'author' => 'required',
            'publishing_house' => 'required',
            'publication_date' => 'required|date',
            'size' => 'required',
            'page_number' => 'required|integer',
            'weight' => 'required|integer',
            'import_price' => 'required|integer',
            'price' => 'required|integer',
            'promotion_price' => 'required|integer',
            'images' => 'required',
            'quantity' => 'required|integer',
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute không được để trống',
            'date' => ':attribute không đúng định dạng',
            'integer' => ':attribute không đúng định dạng',
            'image' => ':attribute không đúng định dạng'
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Tên sản phẩm',
            'title' => 'Tiêu đề sản phẩm',
            'introduction' => 'Nội dung sản phẩm',
            'category' => 'Danh mục',
            'author' => 'Tác giả',
            'publishing_house' => 'Nhà xuất bản',
            'publication_date' => 'Ngày xuất bản',
            'size' => 'Kích thước',
            'page_number' => 'Số trang',
            'weight' => 'Trọng lượng',
            'import_price' => 'Giá nhập',
            'price' => 'Giá bán',
            'promotion_price' => 'Giá khuyến mại',
            'images' => 'Hình ảnh',
            'quantity' => 'Số lượng',
        ];
    }
}
