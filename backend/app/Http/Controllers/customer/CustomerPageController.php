<?php

namespace App\Http\Controllers\customer;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Post;

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

    public function shoppingCart()
    {
        return view('customer.shoppingCart.index');
    }

    public function listProducts()
    {
        return view('customer.productsPage.index');
    }

    public function userInfo()
    {
        return view('customer.userInfo.index');
    }
    public function authListOrder()
    {
        return view('customer.authListOrder.index');
    }

    public function listPosts()
    {
        return view('customer.post.list-post');
    }

    public function postItem()
    {
        return view('customer.post.post-item');
    }

    public function contact ()
    {
        return view('customer.contact.index');
    }

    public function policyRegulations (Request $request)
    {
        if($request->atc){
            $atc = $request->atc;

            $policyRegulation = Post::where('slug', $atc)->get();

            return view('customer.policyRegulations.index', compact('policyRegulation'));
        }
    }
}
