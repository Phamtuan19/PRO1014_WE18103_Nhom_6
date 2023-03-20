<?php

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\HomeController;

use App\Http\Controllers\Admin\AdminController;

use App\Http\Controllers\Admin\AuthorController;

use App\Http\Controllers\Admin\CategoryController;

use App\Http\Controllers\Admin\CustomersController;

use App\Http\Controllers\Admin\ProductController;

use App\Http\Controllers\Admin\PublishingHouseController;

use App\Http\Controllers\customer\auth\LoginController;

use App\Http\Controllers\customer\auth\RegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('login');
});

Auth::routes();

Route::middleware('custom.auth')->group(function () {

    Route::prefix('admin')->name('admin.')->group(function () {

        Route::get('/', function () {
            return "<h1>Trang Admin</h1>";
        });

        Route::resource('/users', AdminController::class);
        Route::patch('/users/replay/{user}', [AdminController::class, 'replay'])->name('users.replay');

        Route::resource('/customers', CustomersController::class);
        Route::patch('/customers/replay/{user}', [CustomersController::class, 'replay'])->name('customers.replay');

        Route::resource('categories', CategoryController::class);

        Route::resource('author', AuthorController::class);

        Route::resource('publishing-house', PublishingHouseController::class);

        Route::resource('products', ProductController::class);
        Route::patch('/products/replay/{product}', [ProductController::class, 'replay'])->name('products.replay');
    });
});


Route::middleware('customer.auth')->group(function () {
    Route::get('customer/home', function () {
        return "<h1>Trang home</h1>";
    })->name('customer.home');
});

Route::get('customer/login', [LoginController::class, 'index'])->name('customer.login');
Route::post('post/login', [LoginController::class, 'login'])->name('post.login');

// đăng ký
Route::get('customer/register', [RegisterController::class, 'index'])->name('customer.register');

Route::post('post/register', [RegisterController::class, 'register'])->name('post.register');
