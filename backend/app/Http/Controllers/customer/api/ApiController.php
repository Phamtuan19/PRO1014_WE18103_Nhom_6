<?php

namespace App\Http\Controllers\customer\api;

use App\Models\Product;
use App\Models\Categories;
use App\Models\StoreCatalog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Image;

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
            ->orderBy('created_at', 'desc')
            ->limit(6)
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
            ->orderBy('promotion_price', 'ASC')
            ->limit(12)
            ->get();

        return $products;
    }

    public function shoppingCart(Request $request)
    {


        $arrayCode = explode(',', request()->code);

        if (is_array($arrayCode)) {

            $product = Product::with('detail', 'image', 'author')->whereIn('product_code', $arrayCode)->get();
        }



        return  $product;
    }

    function productDetail($code)
    {
        $image = DB::table('products')
            ->select(
                'products.*',
                'products_detail.price',
                'products_detail.promotion_price',
                'products_detail.size',
                'products_detail.page_number',
                'products_detail.weight',
            )
            ->where('product_code', '=', $code)
            ->leftJoin('products_detail', 'products_detail.product_id', '=', 'products.id')
            ->get();

        return response()->json(["data" => $image,], 200);
    }

    public function imageProduct($code)
    {
        $product = Product::where('product_code', $code)->get();

        $image = Image::select('image_url')->where('product_id', $product[0]->id)->get();

        return response()->json(["data" => $image,], 200);
    }
}
