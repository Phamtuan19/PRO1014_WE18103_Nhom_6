<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\customer\api\ApiController;
use App\Http\Controllers\customer\api\OrderController;
use App\Http\Controllers\customer\api\ShopProductsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('submenu', [ApiController::class, 'subMenu']);

Route::post('order', [OrderController::class, 'store']);
Route::get('search', [ApiController::class, 'search']);
Route::get('list/products/sale', [ApiController::class, 'listProductsSale']);
Route::get('list/products', [ApiController::class, 'listProducts']);
Route::get('shopping/cart', [ApiController::class, 'shoppingCart']);
Route::get('image-product/{code}', [ApiController::class, 'imageProduct']);
Route::get('product-detail/{code}', [ApiController::class, 'productDetail']);

Route::get('shop-list-products', [ShopProductsController::class, 'index']);
Route::geT('categories-shop-list-products', [ShopProductsController::class, 'categories']);

