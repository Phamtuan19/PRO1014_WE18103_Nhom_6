<?php

namespace App\Http\Controllers\customer\api;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Categories;

class ShopProductsController extends Controller
{
    public function index()
    {
        $products = DB::table('products')
            ->select(
                'products.id',
                'products.product_code',
                'products.name',
                'products.title',
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
            ->whereNull('is_deleted')
            ->get();

        return response()->json($products, 200);
    }

    public function categories()
    {
        $categories = Categories::withCount('product')->get();

        return response()->json($categories, 200);
    }
}
