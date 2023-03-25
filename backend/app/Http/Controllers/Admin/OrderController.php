<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\OrderNote;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();

        return view('admin.orders.index', compact('orders'));
    }

    public function show($code)
    {
        $order = Order::where('code_order', $code)->get();
        $status = [
            'pending' => 11,
            'processing' => 30,
            'shipped' => 52,
            'delivered' => 75,
            'Canceled' => 95.4,
        ];

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

        if(OrderNote::create($data)) {
            return back()->with('msg', 'Thêm ghi chú thành công');
        }

        return back()->with('msg', 'Thêm ghi chú thất bại');
    }
}
