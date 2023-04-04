<?php

use App\Models\Categories;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\AdminController;

use App\Http\Controllers\Admin\OrderController;

use App\Http\Controllers\Admin\AuthorController;

use App\Http\Controllers\Admin\ProductController;

use App\Http\Controllers\Admin\CategoryController;

use App\Http\Controllers\Email\SendMailController;

use App\Http\Controllers\Admin\CustomersController;

use App\Http\Controllers\Admin\StoreCatalogController;

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
    return redirect('trang-chu');
});

Auth::routes();

Route::middleware('custom.auth')->group(function () {

    Route::prefix('admin')->name('admin.')->group(function () {

        Route::resource('/users', AdminController::class);
        Route::patch('/users/replay/{user}', [AdminController::class, 'replay'])->name('users.replay');

        Route::resource('/customers', CustomersController::class);
        Route::patch('/customers/replay/{user}', [CustomersController::class, 'replay'])->name('customers.replay');

        Route::resource('categories', CategoryController::class);

        // Route::get('submenu', function () {
        //     $categories = Categories::orderBy('created_at', 'DESC')->get();
        //     return view('admin.categories.submenu', compact('categories'));
        // });

        Route::resource('author', AuthorController::class);

        Route::resource('publishing-house', PublishingHouseController::class);

        Route::resource('products', ProductController::class);
        Route::patch('/products/replay/{product}', [ProductController::class, 'replay'])->name('products.replay');

        Route::resource('storecatalog', StoreCatalogController::class);

        Route::get('orders', [OrderController::class, 'index'])->name('orders');
        Route::get('orders/{code}', [OrderController::class, 'show'])->name('orders.show');
        Route::post('notes/{code}', [OrderController::class, 'storeNote'])->name('orders.notes');
        Route::patch('order/status/{order}', [OrderController::class, 'orderStatusUpdate'])->name('orders.status.update');

        Route::get('send/mail', [SendMailController::class, 'send_email']);
    });
});


include __DIR__.'/customer.php';
