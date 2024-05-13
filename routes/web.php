<?php

use App\Http\Controllers\Admin\AttendanceController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\MaterialController;
use App\Http\Controllers\Admin\PaymentMethodController;
use App\Http\Controllers\Admin\ScheduleController;
use App\Http\Controllers\Admin\TableController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Auth\EmployeeLoginController;
use App\Http\Controllers\Customer\CartController;
use App\Http\Controllers\Customer\ConfirmController;
use App\Http\Controllers\Customer\ExploreProductController;
use App\Http\Controllers\Customer\Order\OnlineOrderController;
use App\Http\Controllers\Customer\Order\OrderHistoryController;
use App\Http\Controllers\EmployeeHrController;
use App\Http\Controllers\Kasir\OrderTransController;
use App\Http\Controllers\Kasir\PaymentTransController;
use App\Http\Controllers\Koki\OrderProsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductCategoryController;
use App\Http\Controllers\Admin\EmployeeController;
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
Route::get('record-attendance', [AttendanceController::class, 'showQR'])->name('attendance.show');

Route::get('/updateQR', [AttendanceController::class, 'updateQR'])->name('updateQR');
Route::get('/checkQRStatus', [AttendanceController::class, 'checkStatus'])->name('checkQRStatus');


Route::middleware('auth.employee')->group(function () {
    Route::post('employee/logout', [EmployeeLoginController::class, 'logout'])->name('employee.logout');
    Route::get('employee/dashboard', [EmployeeHrController::class, 'dashboard'])->name('employee.dashboard');

    Route::get('employee/attendance', [EmployeeHrController::class, 'attendance'])->name('employee.attendance');
    Route::get('employee/schedule', [EmployeeHrController::class, 'schedule'])->name('employee.schedule');
    Route::get('employee/scan', [EmployeeHrController::class, 'showScan'])->name('employee.scan');
    Route::post('employee/scan', [EmployeeHrController::class, 'scan'])->name('employee.scan.submit');

    Route::get('/employee/form-attendance', [EmployeeHrController::class, 'addConfirm'])->name('employee.attendance.submit');
    Route::post('/employee/form-attendance', [EmployeeHrController::class, 'storeConfirm'])->name('employee.attendance.submit.store');

    Route::get('/employee/form-absence', [EmployeeHrController::class, 'addAbsence'])->name('employee.absence.submit');
    Route::post('/employee/form-absence', [EmployeeHrController::class, 'storeAbsence'])->name('employee.absence.submit.store');

    Route::get('/employee/leave', [EmployeeHrController::class, 'indexLeave'])->name('employee.leave.index');
    Route::get('/employee/form-leave', [EmployeeHrController::class, 'addLeave'])->name('employee.leave.submit');
    Route::post('/employee/form-leave', [EmployeeHrController::class, 'storeLeave'])->name('employee.leave.store');

});

Route::get('employee/login', [EmployeeLoginController::class, 'showLoginForm'])->name('employee.login');
Route::post('employee/login', [EmployeeLoginController::class, 'login'])->name('employee.login.submit');

Route::middleware(['auth', 'verified'])->group(function(){

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


    Route::group(['middleware' => ['role:admin|owner']], function () { 
        Route::get('attendance', [AttendanceController::class, 'index'])->name('attendance.index');
        Route::get('absence', [AttendanceController::class, 'absenceIndex'])->name('absence.index'); 
        Route::get('leave', [ScheduleController::class, 'leaveIndex'])->name('leave.index');
        
        Route::post('update/qr', [AttendanceController::class, 'updateQRStatus'])->name('attendance.qr.status');
        Route::post('update/attendance/status/{id}', [AttendanceController::class, 'updateAttendanceStatus'])->name('attendance.update.status');
        Route::post('update/absence/status/{id}', [AttendanceController::class, 'updateAbsenceStatus'])->name('absence.update.status');
        Route::post('update/leave/status/{id}', [ScheduleController::class, 'updateLeaveStatus'])->name('leave.update.status');
     });
    

    //Route Khusus Admin
    Route::middleware(['role:admin'])->group(function () {
        Route::resource('product-category', ProductCategoryController::class);
        Route::resource('unit', UnitController::class);
        Route::resource('material', MaterialController::class);
        Route::resource('product', ProductController::class);
        Route::resource('table', TableController::class);
        Route::resource('metode', PaymentMethodController::class);
        Route::resource('customer', CustomerController::class);
        Route::resource('employee', EmployeeController::class);

       
        
        Route::get('/kelola-ketidakhadiran', function () {
            return view('user/admin/absences/index');
        })->name('kelolatidakhadir.route');
        Route::get('/kelola-cuti', function () {
            return view('user/admin/leave/index');
        })->name('kelolacuti.route');

    });

    // Route Khusus Kasir
    Route::middleware(['role:kasir'])->group(function () {
        Route::get('/ordertrans', [OrderTransController::class, 'index'])->name('ordertrans.index');
        Route::get('/ordertrans/create/{onlineOrOffline}', [OrderTransController::class, 'create'])->name('ordertrans.create');
        Route::get('/payment/{id}', [PaymentTransController::class, 'show'])->name('payment.show');
        Route::get('/riwayatpesanan', function () {
            return view('user/kasir/order/riwayat');
        })->name('riwayatpesan.route');


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
        Route::get('/order/history', [OrderHistoryController::class, 'index'])->name('order-history.index');
        Route::get('/order/show/{id}', [OrderHistoryController::class, 'show'])->name('order-history.show');
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
        Route::get('/history', function () {
            return view('user/pelanggan/riwayat');
        })->name('riwayat.route');
    });



});




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});




require __DIR__.'/auth.php';
