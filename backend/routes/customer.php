<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CustomersController;
use App\Http\Controllers\customer\auth\loginController;
use App\Http\Controllers\customer\CustomerPageController;
use App\Http\Controllers\customer\VpnayPaymentController;
use App\Http\Controllers\customer\auth\RegisterController;
use App\Http\Controllers\customer\auth\RestPasswordController;


Route::get('trang-chu', [CustomerPageController::class, 'index'])->name('customer.home');

Route::get('san-pham/{product}', [CustomerPageController::class, 'productDetail'])->name('customer.detail.product');

Route::get('lien-he', [CustomerPageController::class, 'contact']);

Route::get('chinh-sach-quy-dinh', [CustomerPageController::class, 'policyRegulations']);

Route::get('customer/login', [LoginController::class, 'index'])->name('customer.login');

Route::get('customer/dang-ky', [RegisterController::class, 'index'])->name('customer.register');

Route::get('quen-mat-khau', [RestPasswordController::class, 'index'])->name('customer.rest.password');

Route::get('verify-password/{token}', [RestPasswordController::class, 'verifyPassword'])->name('verify.password');

// logout
Route::post('customer/logout', function () {
    Auth::guard('customers')->logout();
    return redirect(route('customer.login'));
})->middleware('auth:customers')->name('customer.logout');


Route::get('shopping/cart', [CustomerPageController::class, 'shoppingCart'])->name('shopping/cart');

Route::get('danh-sach-san-pham', [CustomerPageController::class, 'listProducts'])->name('listProducts');

Route::get('tai-khoan', [CustomerPageController::class, 'userInfo']);

Route::get('san-pham-da-mua', [CustomerPageController::class, 'authListOrder']);

Route::get('bai-viet', [CustomerPageController::class, 'listPosts']);
Route::get('bai-viet/{slug}', [CustomerPageController::class, 'postItem']);

// Route::post('/vnpay_payment', [VpnayPaymentController::class, 'index'])->name('vnpay_payment');
