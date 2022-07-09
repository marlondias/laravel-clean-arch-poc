<?php

use App\Http\Controllers\CustomersController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\ProductCategoriesController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(
    [
        'prefix' => '/users',
        'as' => 'users.',
        'controller' => UsersController::class,
    ],
    function () {
        Route::get('/', 'index');
        Route::post('/', 'store');
        Route::get('/{id}', 'show');
        Route::put('/{id}', 'update');
        Route::delete('/{id}', 'destroy');
    }
);

/*
Route::group(
    [
        'prefix' => '/customers',
        'as' => 'customers.',
        'controller' => CustomersController::class,
    ],
    function () {
        Route::get('/', 'index');
        Route::post('/', 'store');
        Route::get('/{id}', 'show');
        Route::put('/{id}', 'update');
        Route::delete('/{id}', 'delete');
    }
);

Route::group(
    [
        'prefix' => '/product-categories',
        'as' => 'productCategories.',
        'controller' => ProductCategoriesController::class,
    ],
    function () {
        Route::get('/', 'index');
        Route::post('/', 'store');
        Route::get('/{id}', 'show');
        Route::put('/{id}', 'update');
        Route::delete('/{id}', 'delete');
    }
);

Route::group(
    [
        'prefix' => '/products',
        'as' => 'products.',
        'controller' => ProductsController::class,
    ],
    function () {
        Route::get('/', 'index');
        Route::post('/', 'store');
        Route::get('/{id}', 'show');
        Route::put('/{id}', 'update');
        Route::delete('/{id}', 'delete');
    }
);

Route::group(
    [
        'prefix' => '/orders',
        'as' => 'orders.',
        'controller' => OrdersController::class,
    ],
    function () {
        Route::get('/', 'index');
        Route::post('/', 'store');
        Route::get('/{id}', 'show');
        Route::put('/{id}', 'update');
        Route::delete('/{id}', 'delete');
    }
);

*/
