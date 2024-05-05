<?php

use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\MaterialController;
use App\Http\Controllers\Admin\PaymentMethodController;
use App\Http\Controllers\Admin\TableController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Customer\CartController;
use App\Http\Controllers\Customer\ConfirmController;
use App\Http\Controllers\Customer\ExploreProductController;
use App\Http\Controllers\Customer\Order\OnlineOrderController;
use App\Http\Controllers\Customer\OrderHistoryController;
use App\Http\Controllers\Kasir\OrderTransController;
use App\Http\Controllers\Kasir\PaymentTransController;
use App\Http\Controllers\Koki\OrderProsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductCategoryController;
use App\Http\Controllers\Admin\UnitController;
use App\Http\Controllers\Admin\ProductController;
use App\Models\Admin\Payment;

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
    return view('landing-page');
});

Route::post('/payments/midtrans-notification', [OnlineOrderController::class, 'receive']);

Route::get('/checkouttry', [OnlineOrderController::class, 'checkout'])->name('checkouttry');
Route::get('/finish-payment', [OnlineOrderController::class, 'finish'])->name('finish-payment');

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
        Route::get('/ordertrans/create/{onlineOrOffline}', [OrderTransController::class, 'create'])->name('ordertrans.create');
        Route::get('/payment/{id}', [PaymentTransController::class, 'show'])->name('payment.show');


        //print
        Route::get('/print/invoice/{id}', function($id){
            $payment = Payment::findOrFail($id);
            return view('print.invoice', compact('payment'));
        })->name('print.invoice');
        Route::get('/print/receipt/{id}', function($id){
            $payment = Payment::findOrFail($id);
            return view('print.receipt', compact('payment'));
        })->name('print.receipt');
    });

    // Route Khusus Koki
    Route::middleware(['role:koki'])->group(function () {
        Route::get('/orderpros', [OrderProsController::class, 'index'])->name('orderpros.index');

    });

    //Route Khusus Pelayan
    Route::middleware(['role:pelayan'])->group(function () {
        Route::get('/orderpros/waiter', [OrderProsController::class, 'index'])->name('orderpros.waiter.index');

    });

    // Route Khusus Owner
    Route::middleware(['role:owner'])->group(function () {


    });

    // Route Khusus Pelanggan
Route::middleware(['role:pelanggan'])->group(function () {

        Route::get('/search-products', [ExploreProductController::class, 'index'])->name('search-products.index');
        Route::get('/confirm/index', [ConfirmController::class, 'index'])->name('confirm.index');
        Route::post('/confirm', [ConfirmController::class, 'confirm'])->name('confirm.confirm');
        Route::get('/checkout/{id}', [OnlineOrderController::class, 'checkout'])->name('checkout');
        Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
        Route::get('/order/history', [OrderHistoryController::class, 'index'])->name('order-history.index')
;
        // Route::get('/cart', function () {
        //     return view('user/pelanggan/cart');
        // })->name('cart.route');
        Route::get('/check-out', function () {
            return view('user/pelanggan/checkout');
        })->name('checksout.route');
        Route::get('/struk', function () {
            return view('user/pelanggan/struk');
        })->name('struk.route');
        Route::get('/invoice', function () {
            return view('user/pelanggan/invoice');
        })->name('invoice.route');
        Route::get('/detail-order', function () {
            return view('user/pelanggan/detailorder');
        })->name('detailorder.route');
        Route::get('/detail-product', function () {
            return view('user/pelanggan/detailproduct');
        })->name('detailproduct.route');
    });



});




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
