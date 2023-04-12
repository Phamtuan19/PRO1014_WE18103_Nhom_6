<?php

namespace App\Http\Controllers\Admin;

use Error;
use Exception;
use App\Models\Order;
use App\Models\OrderNote;
use App\Models\OrderDetail;
use App\Models\OrderStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Warehouse;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::paginate(10);

        return view('admin.orders.index', compact('orders'));
    }

    public function show($code)
    {
        $order = Order::where('code_order', $code)->get();

        $status = OrderStatus::all();

        $detail = OrderDetail::where('order_id', $order[0]->id)->get();

        $deliveryAddress = $order[0]->deliveryAddress;

        return view('admin.orders.show', compact('order', 'detail', 'status', 'deliveryAddress'));
    }

    public function storeNote(Request $request, $code)
    {
        $order = Order::where('code_order', $code)->first();

        $data = [
            'order_id' => $order->id,
            'user_id' => Auth::user()->id,
            'note_takers' => Auth::user()->positions->name,
            'content' => $request->content
        ];

        try {
            if (OrderNote::create($data))
                return back()->with('msg', 'cập nhật thành công');
        } catch (Exception $e) {
            return back()->with('msg', 'cập nhật thất bại');
        }
    }

    public function orderStatusUpdate(Request $request, Order $order)
    {

        if ($request->order_status == 5) {
            $detail = OrderDetail::where('order_id', $order->id)->get();
            // dd($detail);
            foreach ($detail as $item) {
                $warehouses = Warehouse::where('product_id', $item->product->id)->get();

                $warehouses[0]->quantity_stock = $warehouses[0]->quantity_stock + $item->quantity;
                $warehouses[0]->quantity_sold = $warehouses[0]->quantity_sold - $item->quantity;

                $warehouses[0]->save();
            }
        }


        $order->order_status_id = $request->order_status;

        try {
            if ($order->save())
                return back()->with('msg', 'cập nhật thành công');
        } catch (Exception $e) {
            return back()->with('msg', 'cập nhật thất bại');
        }
    }
}
