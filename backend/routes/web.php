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

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {

    Route::prefix('admin')->name('admin.')->group(function () {
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
