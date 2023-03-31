<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\customer\api\ApiController;
use App\Http\Controllers\customer\api\OrderController;

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
Route::get('product-detail/list-image/{code}', [ApiController::class, 'imageProductDetail']);
