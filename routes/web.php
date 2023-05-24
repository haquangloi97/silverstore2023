<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front;
use App\Http\Controllers\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/****************************************** Frontend Controller ******************************************/
Route::get('/', [Front\HomeController::class, 'HomePage'])->name('index');

Route::get('s', [Front\SearchController::class, 'Search'])->name('search');

Route::controller(Front\CartController::class)->group(function () {

    Route::prefix('cart')->group(function () {

        Route::get('/', 'Cart')->name('cart');

        Route::post('/', 'Order');

        Route::get('add-to-cart/{id}', 'AddToCart')->name('addToCart');

        Route::get('cart-remove/{id}', 'CartRemove')->name('cartRemove');

        Route::get('cart-plus/{id}', 'CartPlus')->name('cartPlus');

        Route::get('cart-minus/{id}', 'CartMinus')->name('cartMinus');
    });
});

/****************************************** Product Manager Controller ******************************************/
Route::middleware('auth.admin')->group(function () {

    Route::controller(Dashboard\ProductManagerController::class)->group(function () {

        Route::prefix('admin')->group(function () {

            Route::prefix('product')->group(function () {

                Route::get('new', 'ViewNewProduct')->name('viewNewProduct');

                Route::post('new', 'CreateNewProduct');

                Route::prefix('view')->group(function () {

                    Route::get('/', 'ListProducts')->name('listProducts');

                    Route::get('{foo}', 'ViewProduct')->name('viewProduct');

                    Route::put('{foo}', 'UpdateProduct')->name('updateProduct');

                    Route::delete('{id}', 'DeleteProduct')->name('deleteProduct');
                });
            });
        });
    });
});

/****************************************** Category Manager Controller ******************************************/
Route::middleware('auth.admin')->group(function () {

    Route::controller(Dashboard\CategoryManagerController::class)->group(function () {

        Route::prefix('admin')->group(function () {

            Route::prefix('category')->group(function () {

                Route::prefix('view')->group(function () {

                    Route::get('{foo?}', 'ViewCategory')->name('viewCategory');

                    Route::post('{foo?}', 'CreateCategory')->name('createCategory');

                    Route::delete('{id}', 'DeleteCategory')->name('deleteCategory');

                    Route::put('{foo}', 'UpdateCategory')->name('updateCategory');
                });
            });
        });
    });
});

/****************************************** Order Manager Controller ******************************************/
Route::middleware('auth.admin')->group(function () {

    Route::controller(Dashboard\OrderManagerController::class)->group(function () {

        Route::prefix('admin')->group(function () {

            Route::prefix('order')->group(function () {

                Route::prefix('view')->group(function () {

                    Route::get('/', 'ListOrders')->name('listOrders');

                    Route::get('{id}', 'ViewOrder')->name('viewOrder');

                    Route::delete('{id}', 'DeleteOrder')->name('deleteOrder');
                });
            });
        });
    });
});

/****************************************** User Manager Controller ******************************************/
Route::middleware('auth.admin')->group(function () {

    Route::controller(Dashboard\UserManagerController::class)->group(function () {

        Route::prefix('admin')->group(function () {

            Route::prefix('user')->group(function () {

                Route::prefix('view')->group(function () {

                    Route::get('/', 'ViewUser')->name('viewUser');

                    Route::delete('{id}', 'DeleteUser')->name('deleteUser');
                });
            });
        });
    });
});

/****************************************** Login Controller ******************************************/
Route::controller(Dashboard\LoginController::class)->group(function () {

    Route::prefix('admin')->group(function () {

        Route::get('dashboard', 'Dashboard')->name('dashboard');

        Route::get('login', 'GetLogin')->name('getLogin');

        Route::post('login', 'PostLogin');

        Route::get('registration', 'GetRegistration')->name('getRegistration');

        Route::post('registration', 'PostRegistration');

        Route::get('logout', 'Logout')->name('logout');
    });
});

/****************************************** Frontend Controller 2 ******************************************/
Route::get('{foo}', [Front\ProductsController::class, 'Products']);

Route::get('{foo1}/{foo2}', [Front\DetailsController::class, 'ProductDetails'])->name('productDetails');
