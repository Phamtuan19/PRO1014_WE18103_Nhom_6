<?php

namespace App\Http\Requests\Order;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class OrderRequest extends FormRequest
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
            "name" => "required",
            "email" => "required|email",
            "phone" => [
                'required',
                'regex:/^(0?)(3[2-9]|5[6|8|9]|7[0|6-9]|8[0-6|8|9]|9[0-4|6-9])[0-9]{7}$/',
            ],
            "payment_form" => "required",
            "products" => "required",
            "province_city" => "required",
            "county_district" => "required",
            "house_number_street_name" => "required",
        ];
    }

    public function messages()
    {
        return [
            "required" => ":attribute không được để trống",
            "email" => ":attribute không đúng định dạng",
            "regex" => ":attribute không đúng định dạng",
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Tên người đặt hàng',
            "email" => "Email",
            "phone" => "Số điện thoại",
            "payment_form" => "Hình thức thanh toán",
            "products" => "Sản phẩm",
            "province_city" => "Tỉnh/Thành phố",
            "county_district" => "Quận/Huyện",
            "house_number_street_name" => "Địa chỉ cụ thể",
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([$validator->errors()], 402));
    }
}
