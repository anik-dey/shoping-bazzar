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
