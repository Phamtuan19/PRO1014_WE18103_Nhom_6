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
        $product = Product::where('product_code', $code)->get()[0];

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

    public function userInfo () {
        return view('customer.userInfo.index');
    }
}
