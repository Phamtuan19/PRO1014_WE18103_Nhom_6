<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;

use App\Models\Order;

use App\Models\Product;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index(Request $request)
    {

        $totalRevenue = $this->totalRevenue();
        $totalOrders = $this->totalOrder();
        $totalProducts = $this->totalProducts();
        $totalUsers = $this->totalUser();
        $topProductsOrder = $this->topProductOrder();
        $topUserOrders = $this->topUserOrder();

        return view('admin.dashboard.index', compact(
            'totalRevenue',
            'totalOrders',
            'totalProducts',
            'totalUsers',
            'topProductsOrder',
            'topUserOrders'
        ));
    }

    // Tính tổng doanh thu && tổng đơn hàng thành công
    public function totalRevenue()
    {

        $orders = Order::where('order_status_id', 5)->get()->toArray();

        $totalRevenue = array_reduce($orders, function ($accumulator, $item) {
            return $accumulator + $item['total_price'];
        }, 0);

        return $totalRevenue;
    }

    // Tổng số đơn hàng
    public function totalOrder()
    {
        $orders = Order::all()->toArray();

        return count($orders);
    }

    public function totalProducts()
    {
        $products = Product::all()->toArray();

        return count($products);
    }

    public function totalUser()
    {
        $users = User::where('position_id', 2)->get()->toArray();

        return count($users);
    }

    public function topProductOrder()
    {
        $products = DB::table('products')
            ->select(
                'products.id',
                'products.name',
                'image.image_url',
                'products_detail.price',
                'products_detail.promotion_price',
                'warehouses.quantity_sold'
            )
            ->join('image', 'image.product_id', '=', 'products.id')
            ->join('warehouses', 'warehouses.product_id', '=', 'products.id')
            ->join('products_detail', 'products_detail.product_id', '=', 'products.id')
            ->orderBy('warehouses.quantity_sold', 'DESC')
            ->take(5)
            ->get();

        return $products;
    }

    public function topUserOrder()
    {
        $topCustomers = DB::table('users')
            ->select('users.id', 'users.name', 'users.phone', 'users.email', DB::raw('count(orders.user_id) as total_orders'))
            ->join('orders', 'users.id', '=', 'orders.user_id')
            ->groupBy('users.name', 'users.email', 'users.id', 'users.phone')
            ->orderBy('total_orders', 'DESC')
            ->take(10)
            ->get();

        return $topCustomers;
    }
}
