<?php

use App\Models\User;
use App\Models\Order;


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


function showCategories($categories, $parentId = 1, $char = '')
{
    if ($categories) {
        $result = [];
        foreach ($categories as $key => $category) {
            if ($category->parent_id == $parentId) {

                $result[] = $category;

                // Xóa chuyên mục đã lặp
                unset($categories[$key]);

                // Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
                showCategories($categories, $category->id, $char . '---- ');
            }
        }

        return $result;
    }
}


function data_tree($data, $parent_id = 0, $level = 0)
{
    $result = [];
    foreach ($data as $item) {
        if ($item['parent_id'] == $parent_id) {
            $item['level'] = $level;
            $result[] = $item;
            $child = data_tree($data, $item['id'], $level + 1);
            $result = array_merge($result, $child);
        }
    }

    return $result;
}

function orderStatus($data)
{
    switch ($data) {
        case 'pending':
            echo '<span class="text-danger">Pending</span>';
            break;
        case 'processing':
            echo '<span style="color: red">Processing</span>';
            break;
        case 'shipped':
            echo '<span style="color: red">Shipped</span>';
            break;
        case 'delivered':
            echo '<span class="text-success">Delivered</span>';
            break;
        case 'canceled':
            echo '<span style="color: red">Canceled</span>';
            break;
        default:
            null;
    }
}

function CodeOrder () {
    $code = "OD".str_replace(":", "", date("H:i:s"));

    $codeOrder = Order::where('code_order', $code)->get();

    return count($codeOrder) > 0 ? CodeOrder() : $code;
}
