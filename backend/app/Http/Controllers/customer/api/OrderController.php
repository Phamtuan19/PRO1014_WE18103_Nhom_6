<?php

namespace App\Http\Controllers\customer\api;

use Exception;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderNote;
use App\Models\OrderDetail;
use App\Models\DiscountCode;
use Illuminate\Http\Request;
use App\Models\ProductDetail;
use App\Models\DeliveryAddress;
use App\Http\Controllers\Controller;
use App\Http\Requests\Order\OrderRequest;

class OrderController extends Controller
{
    public function store(OrderRequest $request)
    {
        $products = $request->products;

        $discount = null;

        return  response()->json(["msg" => "thêm sản phẩm thành công",], 200);

        if (!empty($request->discount_code)) {
            $discount = DiscountCode::where('discount_code', $request->discount_code)
                ->where('remaining_quantity', '>', 0)
                ->get();
        }

        $total = array_reduce($products, function ($accumulator, $item) {
            $productItem = ProductDetail::where("product_id", $item['id'])->get();

            $productPrice = $productItem[0]['promotion_price'] ? $productItem[0]['promotion_price'] : $productItem[0]['price'];

            return [
                "total_price" => $accumulator['total_price'] + ($item['quantity'] *  $productPrice),
                "total_quantity" => $accumulator['total_quantity'] + $item['quantity'],
            ];
        }, ["total_price" => 0, "total_quantity" => 0]);

        $newOrder = $this->storeOrder($request, $discount, $total);


        if ($newOrder) {

            $newDeliveryAddress = $this->deliveryAddress($request, $newOrder);

            foreach ($products as  $product) {
                $productItem = ProductDetail::where('product_id', $product['id'])->get();

                $this->orderDetail($newOrder, $product['code'], $productItem[0], $product['quantity']);

            }


            $newNotes = $this->orderNote($request, $newOrder);

            try {
                if ($newDeliveryAddress && $newNotes) {
                    if ($discount !== null) {
                        $discount->remaining_quantity = $discount->remaining_quantity - 1;
                        if ($discount->save())
                            return  response()->json(["msg" => "thêm sản phẩm thành công",], 200);
                    }

                    return  response()->json(["msg" => "thêm sản phẩm thành công",], 200);
                }
            } catch (Exception $e) {
                return response()->json(
                    ["msg" => "Đã có lỗi xảy ra khi đặt hàng, Vui lòng kiểm tra lại"],
                    500
                );
            }
        } else {
            return response()->json(["msg" => "Đã có lỗi xảy ra khi đặt hàng, Vui lòng kiểm tra lại"], 422);
        }
    }

    public function storeOrder($request, $discount, $total)
    {
        if (is_array($total) && !empty($total["total_quantity"]) && !empty($total["total_price"])) {
            $data = [
                'code_order' => CodeOrder(),
                'user_id' => !empty($request->user_id) ? $request->user_id : null,
                'discount_code_id' => !empty($discount) > 0 ? $discount->id : null,
                'order_status' => 1,
                'payment_form' => $request->payment_form,
                'payment_status_id' => 2,
                'quantity' => $total["total_quantity"], // default
                'total_price' => $total["total_price"], // default
                'shipping_fee' => null,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ];

            $orderNew = Order::create($data);

            try {
                if ($orderNew)
                    return $orderNew;
            } catch (Exception $e) {
                return response()->json(["msg" => "Đã có lỗi xảy ra khi đặt hàng, Vui lòng kiểm tra lại"], 422);
            }
        }

        throw new Exception(response()->json(["msg" => "Đã có lỗi xảy ra khi đặt hàng, Vui lòng kiểm tra lại"], 422));
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

        $newOrderDetail = OrderDetail::create($data);

        try {
            if ($newOrderDetail)
                return $newOrderDetail;
        } catch (Exception $e) {
            return response()->json(["msg" => "Đã có lỗi xảy ra khi đặt hàng, Vui lòng kiểm tra lại"], 422);
        }
    }

    public function orderNote($request, $newOrder)
    {

        if ($newOrder && !empty($request->content_note)) {
            $data = [
                'order_id' => $newOrder->id,
                'user_id' => !isset($request->user_id) ? $request->user_id : 1,
                'note_takers' => $request->name . ' (khách hàng)',
                'content' => $request->content_note,
            ];

            $newOrderNote = OrderNote::create($data);

            try {
                if ($newOrderNote)
                    return $newOrderNote;
            } catch (Exception $e) {
                return response()->json(["msg" => "Đã có lỗi xảy ra khi đặt hàng, Vui lòng kiểm tra lại"], 422);
            }
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

        $result = DeliveryAddress::create($data);

        try {
            if ($result)
                return $result;;
        } catch (Exception $e) {
            return response()->json(["msg" => "Đã có lỗi xảy ra khi đặt hàng, Vui lòng kiểm tra lại"], 422);
        }
    }
}
