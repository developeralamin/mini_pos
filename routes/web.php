<?php

use Illuminate\Support\Facades\Route;
// use Illuminate\Support\Facades\Auth;

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

//Route for Login
use App\Http\Controllers\auth\LoginController;
Route::get('login',[LoginController::class,'login'])->name('login');
Route::post('login',[LoginController::class,'authenticate'])->name('login.authenticate');


// Route::group(['middleware' => 'auth'],function() {


use App\Http\Controllers\DashboardController;
Route::get('dashboard',[DashboardController::class,'index'])->name('dashboard');
Route::get('/',[DashboardController::class,'index'])->name('dashboard');


Route::get('logout',[LoginController::class,'logout'])->name('logout');


//Route for UserGroup
use App\Http\Controllers\UserGroupController;
Route::get('groups',[UserGroupController::class, 'index']);
Route::get('groups/create',[UserGroupController::class, 'create']);
Route::post('groups',[UserGroupController::class, 'store']);
Route::delete('groups/{id}',[UserGroupController::class, 'destroy']);



//Route for Sales

use App\Http\Controllers\UserController;
Route::resource('users',UserController::class);

use App\Http\Controllers\UserSalesController;
Route::get('users/{id}/sales',[UserSalesController::class,'index'])->name('user.sales');

Route::post('users/{id}/invoices',[UserSalesController::class,'createinvoice'])->name('user.sales.store');
Route::get('users/{id}/invoices/{invoice_id}',[UserSalesController::class,'detialsinvoice'])->name('user.sales.invoice_details');


Route::delete('users/{id}/invoices/{invoice_id}',[UserSalesController::class,'destroy'])->name('user.sales.destroy');

Route::post('users/{id}/invoices/{invoice_id}',[UserSalesController::class,'additem'])->name('user.sales.invoice.additem');

Route::delete('users/{id}/invoices/{invoice_id}/{item_id}',[UserSalesController::class,'destroyItem'])->name('user.sales.invoice.delete_item');

//Route for Purchases

use App\Http\Controllers\UserPurchasesController;
Route::get('users/{id}/purchases',[UserPurchasesController::class,'index'])->name('user.purchases');

Route::post('users/{id}/purchases',[UserPurchasesController::class,'createinvoice'])->name('user.purchase.store');

Route::get('users/{id}/purchases/{invoice_id}',[UserPurchasesController::class,'detialsinvoice'])->name('user.purchase.invoice_details');


Route::delete('users/{id}/purchases/{invoice_id}',[UserPurchasesController::class,'destroy'])->name('user.purchase.destroy');

Route::post('users/{id}/purchases/{invoice_id}',[UserPurchasesController::class,'additem'])->name('user.purchase.additem');

Route::delete('users/{id}/purchases/{invoice_id}/{item_id}',[UserPurchasesController::class,'destroyItem'])->name('user.purchase.delete_item');


//Route for Payment
use App\Http\Controllers\UserPaymentsController;
Route::get('users/{id}/payments',[UserPaymentsController::class,'index'])->name('user.payments');

Route::post('users/{id}/payments/{invoice_id?}',[UserPaymentsController::class,'store'])->name('user.payments.store');

Route::delete('users/{id}/payments/{payments_id}',[UserPaymentsController::class,'destroy'])->name('user.payments.destroy');



//Route for Receipts
use App\Http\Controllers\UserReceiptsController;
Route::get('users/{id}/receipts',[UserReceiptsController::class,'index'])->name('user.receipts');
Route::post('users/{id}/receipts/{invoice_id?}',[UserReceiptsController::class,'store'])->name('user.receipts.store');

Route::delete('users/{id}/receipts/{receipts_id}',[UserReceiptsController::class,'destroy'])->name('user.receipts.destroy');



//Route for Category
use App\Http\Controllers\CategoryController;
Route::resource('categories',CategoryController::class,['except' => ['show'] ]);


//Route for Products
use App\Http\Controllers\ProductsController;
Route::resource('products',ProductsController::class);

//Route for ProductStocks
use App\Http\Controllers\ProductStocksController;
Route::get('stocks',[ProductStocksController::class, 'index'])->name('stocks');	
	

//Route for Reports
 use App\Http\Controllers\Report\ReportSalesController;
 Route::get('reports/sales',[ReportSalesController::class, 'index'])->name('reports.sales');

 use App\Http\Controllers\Report\ReportPurchasesController;
 Route::get('reports/purchases',[ReportPurchasesController::class, 'index'])->name('reports.purchases');

 use App\Http\Controllers\Report\ReportPaymentsController;
 Route::get('reports/payments',[ReportPaymentsController::class, 'index'])->name('reports.payments');

 use App\Http\Controllers\Report\ReportReceiptsController;	
 Route::get('reports/receipts',[ReportReceiptsController::class, 'index'])->name('reports.receipts');


use App\Http\Controllers\Report\DayReportsController;			
Route::get('reports/days',[DayReportsController::class, 'index'])->name('reports.days');		





// });

