<?php

namespace App\Http\Controllers\customer\api;

use Exception;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderNote;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use App\Models\ProductDetail;
use App\Models\DeliveryAddress;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function store(Request $request)
    {

        // return $request->all();

        $products = $request->products;

        // return response()->json(
        //     [
        //         'products' => $request->products,
        //         "msg" => "thêm sản phẩm thành công",
        //         "status" => true
        //     ],
        //     200
        // );

        $total_price = array_reduce($products, function ($accumulator, $item) {
            return $accumulator + ($item['quantity'] * $item['sale']);
        }, 0);

        $total_quantity = array_reduce($products, function ($accumulator, $item) {
            return $accumulator + $item['quantity'];
        }, 0);

        $newOrder = $this->storeOrder($request, $total_quantity, $total_price);

        if ($newOrder) {

            $newDeliveryAddress = $this->deliveryAddress($request, $newOrder);

            foreach ($products as $index => $product) {
                $productItem = ProductDetail::where('product_id', $product['id'])->get();
                $this->orderDetail($newOrder, $product['code'], $productItem[0], $product['quantity']);
            }

            $newNotes = $this->orderNote($request, $newOrder);
        }

        try {
            if ($newOrder && $newDeliveryAddress && $newNotes) {
                return  response()->json(
                    [
                        "msg" => "thêm sản phẩm thành công",
                        "status" => true,
                        "status_code" => 200
                    ],
                    200
                );
            }
        } catch (Exception $e) {
            return response()->json(
                [
                    "msg" => $e->getMessage(),
                    "status" => true,
                    "status_code" => 500
                ],
                500
            );
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
                'payment_status_id' => null,
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

        if ($newOrder) {
            $data = [
                'order_id' => $newOrder->id,
                'user_id' => !empty($request->user_id) ? $request->user_id : 1,
                'note_takers' => $request->name . ' (khách hàng)',
                'content' => $request->content_note,
            ];

            return OrderNote::create($data);
        }

        return 'error order note';
    }

    public function deliveryAddress($request, $newOrder)
    {
        $data = [
            'user_id' => $request->user_id,
            'order_id' => $newOrder->id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'province_city' => $request->province_city,
            'county_district' => $request->county_district,
            'house_number_street_name' => $request->house_number_street_name
        ];

        return DeliveryAddress::create($data);
    }
}
