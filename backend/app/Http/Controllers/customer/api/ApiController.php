<?php

namespace App\Http\Controllers\customer\api;

use App\Models\Product;
use App\Models\Categories;
use App\Models\StoreCatalog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ApiController extends Controller
{
    public function subMenu()
    {
        $categories = StoreCatalog::with('categories', 'author', 'publishingHouse')->orderBy('location', 'ASC')->get()->toArray();

        return $categories;
    }

    public function search(Request $request)
    {
        if (!empty($request->q)) {
            $products = Product::with(['detail', 'image'])->where('name', 'like', '%' . $request->q . '%')->orderBy('created_at', 'DESC')->get();
        } else {
            $products = Product::with(['detail', 'image'])->orderBy('created_at', 'DESC')->get();
        }

        return $products;
    }

    public function listProducts(Request $request)
    {
        $products = DB::table('products')
            ->select(
                'products.*',
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
            ->orderBy('quantity_sold', 'desc')
            // ->limit(6)
            ->get();

        return $products;
    }

    public function listProductsSale()
    {
        $products = DB::table('products')
            ->select(
                'products.*',
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
            ->orderBy('quantity_sold', 'desc')
            ->limit(6)
            ->get();

        return $products;
    }

    public function shoppingCart(Request $request)
    {


        $arrayCode = explode(',', request()->code);

        if(is_array($arrayCode)){
            // $products = DB::table('products')
            //     ->whrerIn('product_code', $arrayCode)
            //     // ->select(
            //     //     'products.*',
            //     //     'products_detail.price as price',
            //     //     'products_detail.promotion_price as promotion_price',
            //     //     'image.image_url as image_url',
            //     // )
            //     // ->leftJoin('products_detail', 'products_detail.product_id', '=', 'products.id')
            //     // ->leftJoin('image', 'image.product_id', '=', 'products.id')
            //     ->get();

            $product = Product::with('detail', 'image', 'author')->whereIn('product_code', $arrayCode)->get();
        }



        return  $product;
    }
}
