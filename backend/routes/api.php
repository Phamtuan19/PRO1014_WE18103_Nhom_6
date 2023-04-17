<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\customer\api\ApiController;
use App\Http\Controllers\customer\api\OrderController;
use App\Http\Controllers\customer\api\HomeProductListController;
use App\Http\Controllers\customer\api\ProductDetailController;
use App\Http\Controllers\customer\auth\loginController;
use App\Http\Controllers\Admin\Api\DashboardController;

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

Route::middleware('auth:api')->group(function () {
    // API Thay đổi thông tin người dùng
    Route::patch('user/update/{user}', [loginController::class, 'update']);
    Route::patch('user/update/password/{user}', [loginController::class, 'updatePassword']);
    Route::get('list-order', [ApiController::class, 'listOrder']);
    Route::get('list-order-detail/{orderId}', [ApiController::class, 'listOrderDetail']);
    Route::patch('order-cancellation/{orderId}', [ApiController::class, 'orderCancellation']);
});

// Auto Render
Route::get('menu-shop', [ApiController::class, 'subMenu']);

Route::post('order', [OrderController::class, 'store']);

Route::get('search', [ApiController::class, 'search']);



Route::get('shopping/cart', [ApiController::class, 'shoppingCart']);

// Page Home
Route::get('page-home/products-filter-controls', [ApiController::class, 'homeProductSale']);

Route::get('page-home/products-list', [ApiController::class, 'listProducts']);

// Page Product Detail
Route::get('page-product-detail-image/{code}', [ProductDetailController::class, 'imageProduct']);

Route::get('page-product-detail-info/{code}', [ProductDetailController::class, 'productDetail']);

Route::get('page-product-detail-introduce/{code}', [ProductDetailController::class, 'productIntroduce']);

Route::get('page-product-detail-information/{code}', [ProductDetailController::class, 'productInformation']);

Route::get('page-product-details-suggest/{code}', [ProductDetailController::class, 'productSuggest']);

// Page Product
Route::get('page-product/products-list', [HomeProductListController::class, 'index']);

Route::get('page-product/fliter-categories', [HomeProductListController::class, 'categories']);

Route::get('page-product/fliter-auhtor', [HomeProductListController::class, 'author']);

Route::get('page-product/fliter-publishing-house', [HomeProductListController::class, 'publishingHouse']);


// API đăng ký đăng && đăng nhập && quên mật khẩu

Route::post('customer/login', [loginController::class, 'login']);

Route::middleware('auth:api')->group(function () {
    Route::post('customer/logout', [loginController::class, 'logout']);
});

Route::post("customer/register", [loginController::class, 'register']);

Route::patch("rest-password", [loginController::class, 'resetPassword']);

Route::patch("comfirm-password", [loginController::class, 'comfirmPassword']);



// Dashboard Admin

Route::get('admin/dashboard', [DashboardController::class, 'index']);


// Api Posts
Route::get('bai-viet', [ApiController::class, 'postList']);
Route::get('bai-viet/{slug}', [ApiController::class, 'postItem']);
Route::patch('view-post/{slug}', [ApiController::class, 'postView']);


Route::post('binh-luan', [ProductDetailController::class, 'comment']);
Route::get('binh-luan/{productId}', [ProductDetailController::class, 'listComment']);

Route::get('discount/code/{code}', [ApiController::class, 'discountCode']);
Route::get('discount/code', [ApiController::class, 'discountCodeList']);
