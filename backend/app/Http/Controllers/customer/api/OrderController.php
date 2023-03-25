<?php

namespace App\Http\Controllers\customer\api;

use App\Models\Order;
use App\Models\Product;
use App\Models\OrderNote;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProductDetail;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $products = json_decode($request->products, true);

        $total_price = array_reduce($products, function ($accumulator, $item) {
            return $accumulator + ($item['quantity'] * $item['price']);
        }, 0);

        $total_quantity = array_reduce($products, function ($accumulator, $item) {
            return $accumulator + $item['quantity'];
        }, 0);

        $newOrder = $this->storeOrder($request, $total_quantity, $total_price);

        if ($newOrder) {
            foreach ($products as $index => $product) {
                $productItem = ProductDetail::where('product_id', $product['id'])->get();
                $this->orderDetail($newOrder, $product['code'], $productItem[0], $product['quantity']);
            }

            if ($this->orderNote($request, $newOrder)) {
                return response()->json(
                    [
                        "msg" => "Thêm sản phẩm thành công!",
                        "status" => true
                    ],
                    200
                );
            }else {
                return response()->json(
                    [
                        "msg" => "Thêm sản phẩm thất bại!",
                        "status" => true
                    ],
                    500
                );
            }
        }
    }

    public function storeOrder($request, $total_quantity, $total_price)
    {
        if (!empty($total_quantity) && !empty($total_price)) {
            $data = [
                'code_order' => rand(100000, 1000000),
                'user_id' => !empty($request->user_id) ? $request->user_id : null,
                'discount_code_id' => $request->discount_code_id,
                'order_status' => 'pending',
                'payment_form' => $request->payment_form,
                'payment_status' => null,
                'quantity' => $total_quantity, // default
                'total_price' => $total_price, // default
                'shipping_fee' => null,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ];
            $newOrder = Order::create($data);
            return $newOrder;
        }
        return 'error';
    }

    public function orderDetail($newOrder, $productCode, $product, $product_quantity)
    {
        $data = [
            'order_id' => $newOrder->id,
            'product_code' => $productCode,
            'price' => $product->price,
            'price_sale' => $product->promotion_price,
            'quantity' => $product_quantity,
            'total_price' => (!empty($product->promotion_price) ? $product->promotion_price : $product->price) * $product_quantity,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ];

        return OrderDetail::create($data);
    }

    public function orderNote($request, $newOrder)
    {
        $data = [
            'order_id' => $newOrder->id,
            'user_id' => !empty($request->user_id) ? $request->user_id : 1,
            'note_takers' => $request->name . ' (khách hàng)',
            'content' => $request->content_note,
        ];

        return OrderNote::create($data);
    }
}