<?php

use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\MaterialController;
use App\Http\Controllers\Admin\PaymentMethodController;
use App\Http\Controllers\Admin\TableController;
use App\Http\Controllers\Kasir\OrderTransController;
use App\Http\Controllers\Koki\OrderProsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductCategoryController;
use App\Http\Controllers\Admin\UnitController;
use App\Http\Controllers\Admin\ProductController;

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

Route::get('/', function () {
    return view('landing-page.landing-page');
});

Route::middleware(['auth', 'verified'])->group(function(){

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    //Route Khusus Admin
    Route::middleware(['role:admin'])->group(function () {
        Route::resource('product-category', ProductCategoryController::class);
        Route::resource('unit', UnitController::class);
        Route::resource('material', MaterialController::class);
        Route::resource('product', ProductController::class);
        Route::resource('table', TableController::class);
        Route::resource('metode', PaymentMethodController::class);
        Route::resource('customer', CustomerController::class);
    });

    // Route Khusus Kasir
    Route::middleware(['role:kasir'])->group(function () {
        Route::get('/ordertrans', [OrderTransController::class, 'index'])->name('ordertrans.index');

    });

    // Route Khusus Koki
    Route::middleware(['role:koki'])->group(function () {
        Route::get('/orderpros', [OrderProsController::class, 'index'])->name('orderpros.index');

    });

    //Route Khusus Pelayan
    Route::middleware(['role:pelayan'])->group(function () {


    });

    // Route Khusus Owner
    Route::middleware(['role:owner'])->group(function () {


    });

    // Route Khusus Pelanggan
Route::middleware(['role:pelanggan'])->group(function () {
        Route::get('/search-products', function () {
            return view('user/pelanggan/searchproduct');
        })->name('searchproduct.route');
        Route::get('/cart', function () {
            return view('user/pelanggan/cart');
        })->name('cart.route');
        Route::get('/check-out', function () {
            return view('user/pelanggan/checkout');
        })->name('checksout.route');
    });



});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
