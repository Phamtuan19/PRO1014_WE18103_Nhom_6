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
        $year = date('Y');

        for ($i = 1; $i <= 12; $i++) {
            $reslut['month'][$i] = 'Tháng '.$i;
            $order = DB::table('orders')
                ->where('order_status_id', 4)
                ->whereMonth('updated_at', (string)($i))
                ->whereYear('updated_at', $year)
                ->get()->toArray();

            $total = array_reduce($order, function ($accumulator, $item) {
                return $accumulator + $item->total_price;
            }, 0);

            $reslut['total_price'][$i] = $total == 0 ? 1 : $total;
        }

        return response()->json($reslut, 200);
    }
}
