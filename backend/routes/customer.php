<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\customer\auth\loginController;
use App\Http\Controllers\customer\CustomerPageController;
use App\Http\Controllers\customer\auth\RegisterController;


Route::get('trang-chu', [CustomerPageController::class, 'index'])->name('customer.home');
Route::get('san-pham/{product}', [CustomerPageController::class, 'productDetail'])->name('customer.detail.product');

Route::get('customer/login', [LoginController::class, 'index'])->name('customer.login');
Route::post('post/login', [LoginController::class, 'login'])->name('post.login');

// đăng ký
Route::get('customer/register', [RegisterController::class, 'index'])->name('customer.register');

Route::post('post/register', [RegisterController::class, 'register'])->name('post.register');
// logout
Route::post('customer/logout', function () {
    Auth::guard('customers')->logout();
    return redirect(route('customer.login'));
})->middleware('auth:customers')->name('customer.logout');


Route::get('shopping/cart', [CustomerPageController::class, 'shoppingCart'])->name('shopping/cart');
Route::get('order', [CustomerPageController::class, 'order'])->name('order');
Route::get('danh-sach-san-pham', [CustomerPageController::class, 'listProducts'])->name('listProducts');
