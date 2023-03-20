<?php

namespace App\Http\Controllers\customer\api;

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


}
