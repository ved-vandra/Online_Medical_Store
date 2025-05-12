<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\scate;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\categorycontroller;
use App\Http\Controllers\ordersController;
use App\Http\Controllers\salecontroller;
use App\Http\Controllers\usercontroller;

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




Auth::routes();
// route::get('/logout',[HomeController::class , 'logout'])->;
Route::get('/', [HomeController::class, 'index'])->name('welcome');
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/admin', [HomeController::class, 'admin'])->name('admin')->middleware('auth');

Route::get('/alogout', [HomeController::class, 'logout'])->name('authlogout');

// cart //
Route::get('cart', [HomeController::class, 'cart'])->name('cart');
Route::get('checkout', [HomeController::class, 'checkout'])->name('checkout');

// cart updation
Route::get('addtocart/{id}', [HomeController::class, 'addtocart'])->name('addtocart');
Route::get('update-cart', [HomeController::class, 'updatecart'])->name('updatecart');
Route::get('remove-from-cart', [HomeController::class, 'removefromcart'])->name('removefromcart');



Route::post('/placeorder',[ordersController::class , 'placeorder'])->name('placeorder');
Route::post('/checkout',[ordersController::class , 'saveorder'])->name('saveorder');



Route::get('userlogin', [usercontroller::class, 'userlogin'])->name('userlogin');
Route::post('userlogincode',[usercontroller::class, 'userlogincode'])->name('userlogincode');
Route::get('userregister', [usercontroller::class, 'userregister'])->name('userregister');
Route::post('userregistercode',[usercontroller::class, 'userregistercode'])->name('userregistercode');
Route::get('userlogout', [usercontroller::class, 'userlogout'])->name('userlogout');
Route::get('userdetails', [usercontroller::class, 'userdetails'])->name('userdetails');
Route::get('userorders', [usercontroller::class, 'userorders'])->name('userorders');
Route::post('/userupdate',[usercontroller::class , 'userupdate'])->name('userupdate');


Route::get('shop', [HomeController::class, 'shop'])->name('shop');
Route::get('/icategory/{id}', [HomeController::class, 'categoryproducts'])->name('categoryproducts');
Route::get('/isubcategory/{id}', [HomeController::class, 'subcategoryproducts'])->name('subcategoryproducts');
Route::get('/viewproduct/{id}', [HomeController::class, 'viewproduct'])->name('viewproduct');
Route::get('/cstock/{id}', [HomeController::class, 'categorystock'])->name('catestock');
Route::get('/stock/{id}', [HomeController::class, 'subcategorystock'])->name('subcatestock');




route::get('/admin/orders',[orderscontroller::class, 'orders'])->name('orders')->middleware('auth');
Route::get('/admin/vieworders', [orderscontroller::class, 'vieworders'])->name('vieworders')->middleware('auth');
route::delete('/admin/deleteorder/{id}',[orderscontroller::class, 'orderdelete'])->name('orderdelete')->middleware('auth');
route::get('/admin/orderdetail/{id}',[orderscontroller::class, 'orderdetail'])->name('orderdetail')->middleware('auth');



// sku check

Route::post('sku_check',[categorycontroller::class, 'skucheck'])->name('skucheck')->middleware('auth');
Route::post('emailuserunique',[usercontroller::class, 'emailuserunique'])->name('emailuserunique');



// add something






//-----------------------------------------------------------------------------------------------------
// ----------------------------------------CATEGORY---------------------------------------------------- 
//-----------------------------------------------------------------------------------------------------

route::get('/admin/category',[categorycontroller::class, 'category'])->name('category')->middleware('auth');
route::get('/admin/savecategory',[categorycontroller::class, 'savecategoryshow'])->name('savecategoryshow')->middleware('auth');
route::post('/admin/savecategory',[categorycontroller::class, 'savecategory'])->name('savecategory')->middleware('auth');
route::get('/admin/savecategory/{id}',[categorycontroller::class, 'savecategoryshow'])->name('editcategoryshow')->middleware('auth');
route::post('/admin/savecategory/{id}',[categorycontroller::class, 'savecategory'])->name('editcategory')->middleware('auth');
route::delete('/admin/category/{cid}',[categorycontroller::class, 'cdelete'])->name('cdelete')->middleware('auth');



//-----------------------------------------------------------------------------------------------------
// ------------------------------------SUB-CATEGORY---------------------------------------------------- 
//-----------------------------------------------------------------------------------------------------


route::get('/admin/subcategory',[categorycontroller::class, 'scate'])->name('subcategory')->middleware('auth');
route::get('/admin/savesubcategory',[categorycontroller::class, 'savesubcategoryshow'])->name('savesubcategoryshow')->middleware('auth');
route::post('/admin/savesubcategory',[categorycontroller::class, 'savesubcategory'])->name('savesubcategory')->middleware('auth');
route::get('/admin/savesubcategory/{id}',[categorycontroller::class, 'savesubcategoryshow'])->name('editsubcategoryshow')->middleware('auth');
route::post('/admin/savesubcategory/{id}',[categorycontroller::class, 'savesubcategory'])->name('editsubcategory')->middleware('auth');
route::delete('/admin/subcategory/{id}',[categorycontroller::class, 'sdelete'])->name('sdelete')->middleware('auth');



//-----------------------------------------------------------------------------------------------------
// ---------------------------------------PRODUCT------------------------------------------------------ 
//-----------------------------------------------------------------------------------------------------


route::get('/admin/product',[categorycontroller::class, 'product'])->name('product')->middleware('auth');
route::get('/admin/saveproduct',[categorycontroller::class, 'saveproductshow'])->name('saveproductshow')->middleware('auth');
route::post('/admin/saveproduct',[categorycontroller::class, 'saveproduct'])->name('saveproduct')->middleware('auth');
route::get('/admin/saveproduct/{id}',[categorycontroller::class, 'saveproductshow'])->name('editproductshow')->middleware('auth');
route::post('/admin/saveproduct/{id}',[categorycontroller::class, 'saveproduct'])->name('editproduct')->middleware('auth');
route::delete('/admin/product/{id}',[categorycontroller::class, 'pdelete'])->name('pdelete')->middleware('auth');




// drop down list change

route::get('/getscate/{cid}',[categorycontroller::class, 'myformAjax'])->name('scateddl')->middleware('auth');


//image delete
route::get('/deleteimage/{id}',[categorycontroller::class, 'idelete'])->name('imgdel')->middleware('auth');
