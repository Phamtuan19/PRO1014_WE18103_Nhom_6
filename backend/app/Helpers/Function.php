<?php

use App\Models\User;


// fomat money
if (!function_exists('currency_format')) {
    function currency_format($number, $suffix = 'đ')
    {
        if (!empty($number)) {
            return number_format($number, 0, ',', '.') . ' ' . "{$suffix}";
        }
    }
}

function isActiveCustomer($email)
{
    $user = User::where('email', $email)->whereNull('is_deleted')->get();

    if ($user->count() > 0) {
        if ($user[0]->position_id != 3) {
            return 'admin';
        } else {
            return 'member';
        }
    }
    return false;
}


function showCategories($categories, $parentId = null, $char = '')
{
    if ($categories) {
        foreach ($categories as $key => $category) {
            if ($category->parent_id == $parentId) {

                echo '<option value="' . $category->id . '">' . $char . $category->name . '</option>';

                // Xóa chuyên mục đã lặp
                unset($categories[$key]);

                // Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
                showCategories($categories, $category->id, $char . '---- ');
            }
        }
    }
}


