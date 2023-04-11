<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Faker\Core\Number;

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
            'rate' => $this->growthRate($endTotalMoney, $startTotalMoney),
            'detail' => $endTotalMoney - $startTotalMoney,
        ];

        //
        $startOrder = $this->getOrder($startMonth);
        $endOrder = $this->getOrder($endMonth);
        // dd(count($endOrder) - count($startOrder));
        // tổng các đơn hàng
        $totalOrder = [
            'total' => count($this->getOrderStartEnd($startMonth, $endMonth)),
            'rate' => $this->growthRate(count($endOrder), count($startOrder)),
            'detail' => count($endOrder) - count($startOrder),
        ];

        $totalOrderSuccess = [
            'total' => count($this->getOrderSuccessStartEnd($startMonth, $endMonth)),
            'rate' => $this->growthRate(count($this->getOrderSuccess($startMonth)), count($this->getOrderSuccess($endMonth))),
            'detail' => count($this->getOrderSuccess($startMonth)) - count($this->getOrderSuccess($endMonth)),
        ];

        return view('admin.dashboard.index', compact('startMonth', 'endMonth', 'turnover', 'totalOrder', 'totalOrderSuccess'));
    }

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

    public function getOrderSuccess($data)
    {
        return DB::table('orders')
            ->whereMonth('created_at', '=', explode("-", $data)[1])
            ->whereYear('created_at', '=', explode("-", $data)[0])
            ->where('order_status_id', 5)
            ->get()
            ->toArray();
    }

    public function getOrder($monthYear)
    {
        return DB::table('orders')
            ->whereMonth('created_at', '=', explode("-", $monthYear)[1])
            ->whereYear('created_at', '=', explode("-", $monthYear)[0])
            ->get()->toArray();
    }

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
}
