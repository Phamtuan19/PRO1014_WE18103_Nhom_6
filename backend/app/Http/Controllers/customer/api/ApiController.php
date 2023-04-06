<?php

namespace App\Http\Controllers\customer\api;

use App\Models\Image;
use App\Models\Author;
use App\Models\Product;
use App\Models\PublishingHouse;
use App\Models\Categories;
use App\Models\StoreCatalog;
use Illuminate\Http\Request;
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
            $products = Product::with(['detail', 'image'])->where('name', 'like', '%' . $request->q . '%')->orderBy('created_at', 'DESC')->get();
        } else {
            $products = Product::with(['detail', 'image'])->orderBy('created_at', 'DESC')->get();
        }

        return response()->json($products, 200);
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
}
