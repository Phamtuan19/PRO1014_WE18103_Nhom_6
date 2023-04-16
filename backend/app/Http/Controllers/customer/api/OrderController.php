<?php

namespace App\Http\Controllers\customer\api;

use Exception;
use App\Models\Order;
use App\Models\OrderNote;
use App\Models\Warehouse;
use App\Models\OrderDetail;
use App\Models\DiscountCode;
use App\Models\ProductDetail;
use App\Models\DeliveryAddress;
use App\Mail\Order\Successfully;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\Order\OrderRequest;



class OrderController extends Controller
{
    public function store(OrderRequest $request)
    {
        // return  response()->json(["data" => $request->all(),], 200);
        // $products = json_decode($request->products, true);
        $products = $request->products;

        $discount = !empty($request->discount_code) ? $request->discount_code : null;

        foreach ($products as $key => $value) {
            $warehouse = Warehouse::where('product_id', $value['id'])->get();

            if ($warehouse[0]->quantity_stock < $value['quantity']) {
                return response()->json(["msg" => "Số lượng sản phẩm vượt quá số lượng trong kho"], 205);
            }
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
                    foreach ($products as $item) {
                        $wareHouse = Warehouse::where("product_id", $item['id'])->get();

<<<<<<< HEAD
        try {
            if ($newOrder && $newDeliveryAddress && $newNotes) {

                return  response()->json( [ "msg" => "thêm sản phẩm thành công"], 200 );
            }
        } catch (Exception $e) {
            return  response()->json( [ "msg" => "thêm sản phẩm thất bại"], 200 );
=======
                        $wareHouse[0]->quantity_stock = $wareHouse[0]->quantity_stock - $item['quantity'];
                        $wareHouse[0]->quantity_sold = $wareHouse[0]->quantity_sold + $item['quantity'];

                        $wareHouse[0]->save();
                    }

                    $this->sendEmailOrderSuccess($newDeliveryAddress, $newOrder);

                    $this->storeDiscountCode($discount);

                    return  response()->json(["msg" => 'Đặt hàng thành công'], 200);
                }
            } catch (Exception $e) {
                return response()->json(["msg" => $e], 500);
            }
        } else {
            return response()->json(["msg" => "Đã có lỗi xảy ra khi đặt hàng, Vui lòng kiểm tra lại"], 422);
>>>>>>> 6faf90aa204ab78b71ccdc1acc674777cf3c2200
        }
    }

    public function storeDiscountCode($discount_id)
    {
        if (!empty($discount_id)) {
            try {
                $discount = DiscountCode::find($discount_id);
                $discount->remaining_quantity = $discount->remaining_quantity - 1;
                $discount->save();
            } catch (Exception $e) {
                return response()->json(["msg" => $e], 500);
            }
        }
    }

    public function storeOrder($request, $discount, $total)
    {
        if (is_array($total) && !empty($total["total_quantity"]) && !empty($total["total_price"])) {

            if (!empty($discount)) {
                $discountMoney = DiscountCode::find($discount);
            }

            $data = [
                'code_order' => CodeOrder(),
                'user_id' => !empty($request->user_id) ? $request->user_id : null,
                'discount_code_id' => !empty($discount) ? $discount : null,
                'order_status_id' => 1,
                'payment_form' => $request->payment_form,
                'payment_status_id' => 2,
                'quantity' => $total["total_quantity"], // default
                'total_price' => !empty($discountMoney) ? $total["total_price"] - $discountMoney->percentage_decrease : $total["total_price"], // default
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
                return $result;
        } catch (Exception $e) {
            return response()->json(["msg" => "Đã có lỗi xảy ra khi đặt hàng, Vui lòng kiểm tra lại"], 422);
        }
    }

    function sendEmailOrderSuccess($deliveryAddress, $newOrder)
    {
        $data = [
            'order' => $newOrder,
            'address' => $deliveryAddress,
        ];

        $send = $deliveryAddress->email;

        return Mail::to($send)->send(new Successfully($data)) ? true : false;
    }
}
