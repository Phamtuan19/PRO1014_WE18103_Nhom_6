<?php

namespace App\Http\Controllers\customer\api;

use App\Models\Product;
use App\Models\Categories;
use App\Models\StoreCatalog;
use Illuminate\Http\Request;
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

    public function listProducts (Request $request) {

        $products = Product::with('detail', 'image');



        $products =$products->orderBy('created_at', 'DESC');

        $products = $products->get();

        return $products;
    }
}
