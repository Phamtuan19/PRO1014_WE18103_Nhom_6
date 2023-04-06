<?php

namespace App\Http\Controllers\customer\api;

use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\ProductDetail;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ProductDetailController extends Controller
{
    function productDetail($code)
    {
        $product = DB::table('products')
            ->select(
                'products.*',
                'products_detail.price',
                'products_detail.promotion_price',
                'products_detail.size',
                'products_detail.page_number',
                'products_detail.weight',
                'author.name as author_name',
                'categories.name as categories_name',
                'warehouses.quantity_sold as quantity_sold',
                'publishing_house.name as publishing_house_name',
                'publishing_house.slug as publishing_house_slug',
            )
            ->where('product_code', '=', $code)
            ->leftJoin('products_detail', 'products_detail.product_id', '=', 'products.id')
            ->leftJoin('author', 'author.id', '=', 'products.author_id')
            ->leftJoin('categories', 'categories.id', '=', 'products.category_id')
            ->leftJoin('warehouses', 'warehouses.product_id', '=', 'products.id')
            ->leftJoin('publishing_house', 'publishing_house.id', '=', 'products.publishing_house_id')
            ->get();

        return response()->json($product, 200);
    }

    public function imageProduct($code)
    {
        $product = Product::select('id')->where('product_code', $code)->get();

        $image = Image::select('id', 'image_url')->where('id', $product[0]->id)->get();

        return response()->json($image, 200);
    }

    public function productIntroduce($code)
    {
        $product = Product::select('id', 'introduction')->where('product_code', $code)->get();

        return response()->json($product, 200);
    }

    public function productInformation($code)
    {
        $detail = Product::select('id')
            ->select(
                'products.id',
                'products.product_code',
                'products.publication_date',
                'products_detail.size',
                'products_detail.page_number',
                'products_detail.weight',
                'products_detail.import_price',
                'publishing_house.name as publishing_house_name',
            )
            ->leftJoin('products_detail', 'products_detail.product_id', '=', 'products.id')
            ->leftJoin('publishing_house', 'publishing_house.id', '=', 'products.publishing_house_id')
            ->where('product_code', $code)
            ->get();

        return response()->json($detail, 200);
    }

    public function productSuggest($code)
    {
        $product = Product::where('product_code', $code)->get();

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
            ->where('category_id', $product[0]->category_id)
            ->whereNull('is_deleted')
            ->limit(4)
            ->get();

        return response()->json($products, 200);
    }
}
