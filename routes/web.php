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

use App\Http\Controllers\auth\LoginController;
Route::get('login',[LoginController::class,'login'])->name('login');
Route::post('login',[LoginController::class,'authenticate'])->name('login.authenticate');


// Route::group(['middleware' => 'auth'],function() {

Route::get('dashboard', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('welcome');
});



// use App\Http\Controllers\auth\LoginController;
Route::get('logout',[LoginController::class,'logout'])->name('logout');


use App\Http\Controllers\UserGroupController;
Route::get('groups',[UserGroupController::class, 'index']);
Route::get('groups/create',[UserGroupController::class, 'create']);
Route::post('groups',[UserGroupController::class, 'store']);
Route::delete('groups/{id}',[UserGroupController::class, 'destroy']);


//All  user info 
//All  user info 

use App\Http\Controllers\UserController;
Route::resource('users',UserController::class);

use App\Http\Controllers\UserSalesController;
Route::get('users/{id}/sales',[UserSalesController::class,'index'])->name('user.sales');

use App\Http\Controllers\UserPurchasesController;
Route::get('users/{id}/purchases',[UserPurchasesController::class,'index'])->name('user.purchases');


use App\Http\Controllers\UserPaymentsController;
Route::get('users/{id}/payments',[UserPaymentsController::class,'index'])->name('user.payments');

Route::post('users/{id}/payments',[UserPaymentsController::class,'store'])->name('user.payments.store');

Route::delete('users/{id}/payments/{payments_id}',[UserPaymentsController::class,'destroy'])->name('user.payments.destroy');




use App\Http\Controllers\UserReceiptsController;
Route::get('users/{id}/receipts',[UserReceiptsController::class,'index'])->name('user.receipts');



//Category Controller
use App\Http\Controllers\CategoryController;
Route::resource('categories',CategoryController::class,['except' => ['show'] ]);

//Category Controller
use App\Http\Controllers\ProductsController;
Route::resource('products',ProductsController::class);

	
	



// });



