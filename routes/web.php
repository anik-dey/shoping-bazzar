<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

//landing page

Route::get('/shoping-bazzar', [App\Http\Controllers\BaseController::class,'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Admin Category
Route::any('category/create', [App\Http\Controllers\Admin\CategoryController::class, 'createCategory'])->name('createCategory');
Route::get('/caregory-show', [App\Http\Controllers\Admin\CategoryController::class, 'showCategory'])->name('showCategory');
Route::any('category-edit/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'editCategory'])->name('editCategory');
Route::get('/category-delete/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'deleteCategory'])->name('deleteCategory');

//Admin Product
Route::any('product/create', [App\Http\Controllers\Admin\ProductController::class, 'createProduct'])->name('createProduct');
Route::get('/product-show', [App\Http\Controllers\Admin\ProductController::class, 'showProduct'])->name('showProduct');
Route::get('/product-status/{status}', [App\Http\Controllers\Admin\ProductController::class, 'statusProduct'])->name('statusProduct');
Route::get('/product-edit/{id}', [App\Http\Controllers\Admin\ProductController::class, 'editProduct'])->name('editProduct');
Route::post('/product-update/{id}', [App\Http\Controllers\Admin\ProductController::class, 'updateProduct'])->name('updateProduct');
Route::get('/product-delete/{id}', [App\Http\Controllers\Admin\ProductController::class, 'deleteProduct'])->name('deleteProduct');

//Admin Coupon
Route::any('/coupons', [App\Http\Controllers\Admin\CouponController::class, 'createCoupon'])->name('createCoupon');
Route::get('/coupon-show',[App\Http\Controllers\Admin\CouponController::class, 'showCoupon'])->name('showCoupon');
Route::any('/coupon-edit/{coupon_id}',[App\Http\Controllers\Admin\CouponController::class, 'editCoupon'])->name('editCoupon');
Route::get('/coupon-delete/{id}', [App\Http\Controllers\Admin\CouponController::class, 'deleteCoupon'])->name('deleteCoupon');

//User Pannel
Route::get('/product-lists/{id}', [App\Http\Controllers\BaseController::class, 'listProduct'])->name('listProduct');

//Cart
Route::get('cart', [App\Http\Controllers\User\CartController::class, 'cartList'])->name('cart.list');
Route::get('/cart-store/{id}', [App\Http\Controllers\User\CartController::class, 'addToCart'])->name('cart.store');
Route::get('/product-lists/cart-store/{id}', [App\Http\Controllers\User\CartController::class, 'addToCart'])->name('cart.storee');
Route::get('update-cart/{quantity}/{id}/{fun}', [App\Http\Controllers\User\CartController::class, 'updateCart'])->name('cart.update');
Route::get('remove/{id}', [App\Http\Controllers\User\CartController::class, 'removeCart'])->name('cart.remove');
Route::get('clear', [App\Http\Controllers\User\CartController::class, 'clearAllCart'])->name('cart.clear');

//Coupon
Route::post('cart', [App\Http\Controllers\User\CouponController::class, 'userCoupon'])->name('userCoupon');
