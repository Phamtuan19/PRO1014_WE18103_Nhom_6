<?php

namespace App\Http\Controllers\customer\api;

use App\Models\Author;
use App\Models\Product;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\PublishingHouse;

class HomeProductListController extends Controller
{
    public function index(Request $request)
    {
        $pagination = 6;
        $orderBy = "promotion_price";
        $orderType = "ASC";

        $products = DB::table('products')
            ->select(
                'products.id',
                'products.product_code',
                'products.name',
                'products.title',
                'products.image_url as image_url',
                'products.is_deleted',
                'products_detail.price as price',
                'products_detail.promotion_price as promotion_price',
                'author.name as author_name',
                'author.slug as author_slug',
                'warehouses.quantity_sold as quantity_sold',
                'categories.slug as category_slug',
            )
            ->leftJoin('products_detail', 'products_detail.product_id', '=', 'products.id')
            ->leftJoin('author', 'author.id', '=', 'products.author_id')
            ->leftJoin('warehouses', 'warehouses.product_id', '=', 'products.id')
            ->leftJoin('categories', 'categories.id', '=', 'products.category_id')
            ->join('publishing_house', 'publishing_house.id', '=', 'products.publishing_house_id')
            ->whereNull('is_deleted');

        if ($request->input('danh-muc') !== null) {
            $searchCategory = $request->input('danh-muc');

            $products = $products->where('categories.slug', '=', $searchCategory);
        }

        if ($request->input("tac-gia") !== null) {
            $searchAuthor = $request->input('tac-gia');

            $products = $products->where('author.slug', '=', $searchAuthor);
        }

        if ($request->input('price') !== null) {
            $price = explode('-', $request->input('price'));

            $products = $products->where('products_detail.price', '>=', $price[0])
                ->where('products_detail.promotion_price', '<=', $price[1]);
        }

        if ($request->input('nha-xuat-ban') !== null) {
            $products = $products->where('publishing_house.slug', '=', $request->input('nha-xuat-ban'));
        }

        if ($request->input("sort") !== null) {
            $sort = $request->input('sort');

            switch ($sort) {
                case 'gia-thap-nhat':
                    $orderBy = "products_detail.promotion_price";
                    $orderType = "DESC";
                    break;
                case 'gia-cao-nhat':
                    $orderBy = "products_detail.promotion_price";
                    $orderType = "ASC";
                    break;
                case 'san-pham-moi':
                    $orderBy = 'products.created_at';
                    $orderType = "ASC";
                    break;
                case 'san-pham-cu':
                    $orderBy = 'products.created_at';
                    $orderType = "DESC";
                    break;
            }
        }

        if ($request->input("pagination") !== null) {
            $pagination = $request->input("pagination");
        }

        $products = $products->orderBy($orderBy, $orderType)->paginate($pagination);

        return response()->json($products, 200);
    }

    public function categories()
    {
        $categories = Categories::withCount(['product' => function ($query) {
            $query->whereNull('is_deleted');
        }])
            ->get();

        return response()->json($categories, 200);
    }

    public function author()
    {
        $author = Author::withCount(['product' => function ($query) {
            $query->whereNull('is_deleted');
        }])->get();

        return response()->json($author, 200);
    }

    public function publishingHouse()
    {
        $publishingHouse = PublishingHouse::withCount(['product' => function ($query) {
            $query->whereNull('is_deleted');
        }])
            ->get();

        return response()->json($publishingHouse, 200);
    }
}
