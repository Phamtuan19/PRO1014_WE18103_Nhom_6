<?php

namespace App\Http\Controllers\customer;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class CustomerPageController extends Controller
{
    public function index()
    {
        return view('customer.homePage.index');
    }

    public function productDetail($code)
    {
        // $product = DB::table('products')
        //     ->select(
        //         'products.*',
        //         'products_detail.price as price',
        //         'products_detail.promotion_price as promotion_price',
        //         'image.image_url as image_url',
        //         'author.name as author_name',
        //         'warehouses.quantity_sold as quantity_sold'
        //     )
        //     ->where('product_code', $code)
        //     ->leftJoin('products_detail', 'products_detail.product_id', '=', 'products.id')
        //     ->leftJoin('image', 'image.product_id', '=', 'products.id')
        //     ->leftJoin('author', 'author.id', '=', 'products.author_id')
        //     ->leftJoin('warehouses', 'warehouses.product_id', '=', 'products.id')
        //     ->orderBy('quantity_sold', 'desc')
        //     // ->limit(6)
        //     ->get()->toArray()[0];

        $product = Product::where('product_code', $code)->get()[0];

            // dd($product->warehouses);
        return view('customer.productDetail.index', compact('product'));
    }

    public function shoppingCart () {
        return view('customer.shoppingCart.index');
    }

    public function order () {
        return view('customer.order.index');
    }

    public function listProducts () {
        return view('customer.productsPage.index');
    }
}
