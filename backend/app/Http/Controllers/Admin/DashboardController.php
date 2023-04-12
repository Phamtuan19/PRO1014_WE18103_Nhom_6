<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Carbon\Carbon;
use Faker\Core\Number;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $orders = Order::orderBy('created_at', 'DESC')->take(10)->get();
        return view('admin.dashboard.index', compact('orders'));
    }


}
