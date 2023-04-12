<?php

namespace App\Http\Controllers\Admin\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $startMonth = null;
        $endMonth = null;
        $totalAllOrder = null;

        if (!empty($request->startMonth) && !empty($request->endMonth)) {
            $startMonth = $request->startMonth;
            $endMonth = $request->endMonth;
        } else {
            $startMonth = Carbon::now()->subMonth()->format('Y-m'); // Lấy tháng trước so với tháng hiện tại;
            $endMonth = date('Y-m'); // Lấy tháng hiện tại
            $totalAllOrder = $this->totalMoney(DB::table('orders')->where('order_status_id', 5)->get()->toArray());
        }

        // tổng tiền các đơn hàng giao thành công tháng trước tháng hiện tại
        $startTotalMoney = $this->totalMoney($this->getOrderSuccess($startMonth));

        // tổng tiền các đơn hàng giao thành công tháng tháng hiện tại
        $endTotalMoney = $this->totalMoney($this->getOrderSuccess($endMonth));

        $turnover = [
            'total' => $totalAllOrder != null ? $totalAllOrder : $this->totalMoney($this->getOrderSuccessStartEnd($startMonth, $endMonth)),
            'detail' => $endTotalMoney - $startTotalMoney,
        ];

        // tổng các đơn hàng
        $totalOrder = [
            'total' => count($this->getOrderStartEnd($startMonth, $endMonth)),
            'detail' => count($this->getOrder($endMonth)) - count($this->getOrder($startMonth)),
        ];

        $totalOrderSuccess = [
            'total' => count($this->getOrderSuccessStartEnd($startMonth, $endMonth)),
            'detail' => count($this->getOrderSuccess($startMonth)) - count($this->getOrderSuccess($endMonth)),
        ];

        $data = [
            'turnover' => $turnover,
            'totalOrder' => $totalOrder,
            'totalOrderSuccess' => $totalOrderSuccess
        ];

        // return $this->topProducts();

        return response()->json(['statistic' => $data, 'topProducts' => $this->topProducts()], 200);
    }

    // lấy tất cả đơn hàng thành công từ ngày Y-m đến ngày Y-m
    public function getOrderSuccessStartEnd($startMonth, $endMonth)
    {
        return DB::table('orders')
            ->whereYear('created_at', '>=',  explode("-", $startMonth)[0])
            ->whereYear('created_at', '<=',  explode("-", $endMonth)[0])
            ->whereMonth('created_at', '>=', explode("-", $startMonth)[1])
            ->whereMonth('created_at', '<=', explode("-", $endMonth)[1])
            ->where('order_status_id', 5)
            ->get()
            ->toArray();
    }

    // lấy tất cả đơn hàng từ ngày Y-m đến ngày Y-m
    public function getOrderStartEnd($startMonth, $endMonth)
    {
        return DB::table('orders')
            ->whereYear('created_at', '>=',  explode("-", $startMonth)[0])
            ->whereYear('created_at', '<=',  explode("-", $endMonth)[0])
            ->whereMonth('created_at', '>=', explode("-", $startMonth)[1])
            ->whereMonth('created_at', '<=', explode("-", $endMonth)[1])
            ->get()
            ->toArray();
    }

    // lấy những đơn hàng giao thành công
    public function getOrderSuccess($data)
    {
        return DB::table('orders')
            ->whereMonth('created_at', '=', explode("-", $data)[1])
            ->whereYear('created_at', '=', explode("-", $data)[0])
            ->where('order_status_id', 5)
            ->get()
            ->toArray();
    }

    // lấy danh sách đơn hàng
    public function getOrder($monthYear)
    {
        return DB::table('orders')
            ->whereMonth('created_at', '=', explode("-", $monthYear)[1])
            ->whereYear('created_at', '=', explode("-", $monthYear)[0])
            ->get()->toArray();
    }

    // Tính tổng tiền
    public function totalMoney($orders)
    {
        return array_reduce($orders, function ($accumulator, $item) {
            if ($item->order_status_id == 5) {
                return $accumulator + $item->total_price;
            }

            return $accumulator;
        }, 0);
    }

    // tính phần trăm tăng trưởng;
    public function growthRate($number_1, $number_2)
    {
        if ($number_1 == 0 || $number_2 == 0) {
            return 0;
        } else {
            return (($number_1 - $number_2) / $number_2) * 100;
        }
    }

    public function topProducts () {
        $product = DB::table('products')
            ->select(
                'products.*',
                'products_detail.price',
                'products_detail.promotion_price',
                'author.name as author_name',
                'warehouses.quantity_sold as quantity_sold',
                'image.image_url'
            )
            ->leftJoin('products_detail', 'products_detail.product_id', '=', 'products.id')
            ->leftJoin('author', 'author.id', '=', 'products.author_id')
            ->leftJoin('warehouses', 'warehouses.product_id', '=', 'products.id')
            ->leftJoin('image', 'image.product_id', '=', 'products.id')
            ->orderBy('warehouses.quantity_sold', 'DESC')
            ->take(5)
            ->get();

            return $product;
    }
}
