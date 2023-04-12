<?php

namespace App\Http\Controllers\customer\api;

use Exception;
use App\Models\Post;
use App\Models\User;
use App\Models\Image;
use App\Models\Order;
use App\Models\Author;
use App\Models\Product;
use App\Models\Warehouse;
use App\Models\Categories;
use App\Models\OrderDetail;
use App\Models\StoreCatalog;
use Illuminate\Http\Request;
use App\Models\PublishingHouse;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ApiController extends Controller
{
    public function subMenu()
    {
        $catalog = StoreCatalog::select('name', 'slug')
            ->orderBy('location', 'DESC')
            ->get();

        return $catalog;
    }

    public function search(Request $request)
    {

        if (!empty($request->q)) {
            $data = DB::table('products')
                ->select(
                    'products.id',
                    'products.product_code',
                    'products.name',
                    'products_detail.price',
                    'products_detail.promotion_price',
                    'image.image_url',
                    'author.name as author_name',
                )
                ->join('products_detail', 'products_detail.product_id', '=', 'products.id')
                ->join('image', 'image.product_id', '=', 'products.id')
                ->join('author', 'author.id', '=', 'products.author_id')
                ->where('products.name', 'like', '%' . $request->q . '%')
                ->take(4)->get();

            return response()->json($data, 200);
        }
    }

    public function listProducts(Request $request)
    {
        $products = DB::table('products')
            ->select(
                'products.id',
                'products.product_code',
                'products.name',
                'products_detail.price as price',
                'products_detail.promotion_price as promotion_price',
                'image.image_url as image_url',
                'author.name as author_name',
                'warehouses.quantity_sold as quantity_sold'
            )
            ->leftJoin('products_detail', 'products_detail.product_id', '=', 'products.id')
            ->leftJoin('image', 'image.product_id', '=', 'products.id')
            ->leftJoin('author', 'author.id', '=', 'products.author_id')
            ->leftJoin('warehouses', 'warehouses.product_id', '=', 'products.id')
            ->orderBy('products.created_at', 'desc')
            ->whereNull('is_deleted')
            ->limit(8)
            ->get();

        return response()->json($products, 200);
    }

    public function homeProductSale(Request $request)
    {
        $orderBy = 'warehouses.quantity_sold';
        $orderType = 'ASC';

        if ($request->orderBy == 'bestseller') {
            $orderBy = 'warehouses.quantity_sold';
        }

        if ($request->orderBy == 'newest') {
            $orderBy = 'products.created_at';
        }

        if ($request->orderBy == 'bestPrice') {
            $orderBy = 'products_detail.promotion_price';
        }

        $products = DB::table('products')
            ->select(
                'products.id',
                'products.product_code',
                'products.name',
                'products_detail.price as price',
                'products_detail.promotion_price as promotion_price',
                'image.image_url as image_url',
                'author.name as author_name',
                'warehouses.quantity_sold as quantity_sold'
            )
            ->leftJoin('products_detail', 'products_detail.product_id', '=', 'products.id')
            ->leftJoin('image', 'image.product_id', '=', 'products.id')
            ->leftJoin('author', 'author.id', '=', 'products.author_id')
            ->leftJoin('warehouses', 'warehouses.product_id', '=', 'products.id')
            ->orderBy($orderBy, $orderType)
            ->whereNull('is_deleted')
            ->limit(4)
            ->get();

        return response()->json($products, 200);
    }

    public function shoppingCart(Request $request)
    {
        $arrayCode = explode(',', request()->code);

        if (is_array($arrayCode)) {

            $products = DB::table('products')
                ->select(
                    'products.id',
                    'products.product_code',
                    'products.name',
                    'products_detail.price as price',
                    'products_detail.promotion_price as promotion_price',
                    'image.image_url as image_url',
                    'author.name as author_name',
                    'warehouses.quantity_sold as quantity_sold'
                )
                ->leftJoin('products_detail', 'products_detail.product_id', '=', 'products.id')
                ->leftJoin('image', 'image.product_id', '=', 'products.id')
                ->leftJoin('author', 'author.id', '=', 'products.author_id')
                ->leftJoin('warehouses', 'warehouses.product_id', '=', 'products.id')
                ->whereNull('is_deleted')
                ->whereIn('product_code', $arrayCode)
                ->get();
        }
        return  response()->json($products, 200);
    }

    public function listOrder(Request $request)
    {
        $user = $request->user();
        $orders = DB::table('orders')
            ->select(
                'orders.id',
                'orders.code_order',
                'orders.user_id as user_id',
                'orders.discount_code_id',
                'orders.payment_form',
                'orders.quantity',
                'orders.total_price',
                'orders.created_at',
                'orders.updated_at',
                'order_status.name as order_status_name',
                'orders.order_status_id as order_status_id'
            )
            ->where('user_id', $user->id)
            ->join('order_status', 'order_status.id', '=', 'orders.order_status_id')
            ->orderBy('order_status_id')
            ->get();

        return  response()->json($orders, 200);
    }

    public function listOrderDetail($orderId)
    {
        $orderDetails =  DB::table('orders')
            ->select(
                'orders.id',
                'orders.code_order',
                'orders.created_at',
                'orders.updated_at',
                'orders.total_price',
                'orders.order_status_id',
                'delivery_address.name as user_name',
                'delivery_address.email as user_email',
                'delivery_address.phone as user_phone',
                'delivery_address.province_city as user_province_city',
                'delivery_address.county_district as user_county_district',
                'delivery_address.house_number_street_name as user_house_number_street_name',
                'order_status.name as order_status_name'
            )
            ->join('delivery_address', 'delivery_address.order_id', '=', 'orders.id')
            ->join('order_status', 'order_status.id', '=', 'orders.order_status_id')
            ->where('orders.id', $orderId)
            ->get();

        $orderDetails['detail'] = DB::table('order_detail')
            ->select(
                'order_detail.*',
                'products.name as product_name',
                'image.image_url'
            )
            ->join('products', 'order_detail.product_code', '=', 'products.product_code')
            ->join('image', 'image.product_id', '=', 'products.id')
            ->where('order_detail.order_id', $orderId)
            ->get();

        return  response()->json($orderDetails, 200);
    }

    public function orderCancellation($orderId)
    {
        $order = Order::find($orderId);
        // return  response()->json($order, 200);

        $detail = OrderDetail::where('order_id', $order->id)->get();
        // dd($detail);
        foreach ($detail as $item) {
            $warehouses = Warehouse::where('product_id', $item->product->id)->get();

            $warehouses[0]->quantity_stock = $warehouses[0]->quantity_stock + $item->quantity;
            $warehouses[0]->quantity_sold = $warehouses[0]->quantity_sold - $item->quantity;

            $warehouses[0]->save();
        }

        if ($order) {
            if ($order->order_status_id < 3) {
                $order->order_status_id = 5;
                try {
                    $order->save();
                    return  response()->json(['msg' => 'Hủy đơn hàng thành công'], 200);
                } catch (\Throwable $th) {
                    return  response()->json(['msg' => 'Hủy đơn hàng thất bại'], 402);
                }
            }
            return  response()->json(['msg' => 'Đã có lỗi xảy ra vui lòng thử lại!'], 402);
        }
        return  response()->json(['msg' => 'Đã có lỗi xảy ra vui lòng thử lại!'], 402);
    }

    public function postList()
    {

        $posts = DB::table('post')
            ->select('post.*', 'users.name as user_name')
            ->join('users', 'users.id', '=', 'post.user_id')
            ->orderBy('created_at', 'DESC')
            ->get();

        $topView =  DB::table('post')
            ->select('post.*', 'users.name as user_name')
            ->join('users', 'users.id', '=', 'post.user_id')
            ->orderBy('view', 'DESC')
            ->take(5)
            ->get();

        return  response()->json([
            'postNew' => $posts,
            'topView' => $topView,
        ], 200);
    }



    public function postItem($slug)
    {
        $post = DB::table('post')
            ->select('post.*', 'users.name as user_name')
            ->join('users', 'users.id', '=', 'post.user_id')
            ->where('post.slug', '=', $slug)
            ->get();

        return  response()->json($post, 200);
    }

    public function postView(Request $request, $id)
    {
        $post = Post::find($id);

        $post->view = $post->view + 1;

        $post->save();
        // DB::update('UPDATE post SET view= ? WHERE id = ?', [$id,  $view]);

        return  response()->json(['mssg' => 'thành công'], 200);
    }
}
