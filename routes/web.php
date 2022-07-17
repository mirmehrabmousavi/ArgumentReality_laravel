<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', [\App\Http\Controllers\IndexController::class, 'index'])->name('index');
Route::get('/code/1000{id}', [\App\Http\Controllers\IndexController::class, 'showCode'])->name('show.code');
Route::get('/code/1000{id}/product/{proId}', [\App\Http\Controllers\IndexController::class, 'showAr'])->name('show.ar');
Route::get('/product/1000{id}', [\App\Http\Controllers\IndexController::class, 'showProduct'])->name('show.product');

Auth::routes();

//User
Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
});

//Admin
Route::group(['prefix' => 'admin', ['middleware' => 'admin']], function () {
    Route::get('/home', [\App\Http\Controllers\Admin\AdminController::class, 'index'])->name('admin.home');
    //Code
    Route::get('/code', [\App\Http\Controllers\Admin\CodeController::class, 'indexCode'])->name('admin.indexCode');
    Route::get('/code/create', [\App\Http\Controllers\Admin\CodeController::class, 'createCode'])->name('admin.createCode');
    Route::post('/code/store', [\App\Http\Controllers\Admin\CodeController::class, 'storeCode'])->name('admin.storeCode');
    Route::get('/code/edit/{id}', [\App\Http\Controllers\Admin\CodeController::class, 'editCode'])->name('admin.editCode');
    Route::patch('/code/edit/{id}', [\App\Http\Controllers\Admin\CodeController::class, 'updateCode'])->name('admin.updateCode');
    Route::delete('/code/delete/{id}', [\App\Http\Controllers\Admin\CodeController::class, 'deleteCode'])->name('admin.deleteCode');
    //Product
    Route::get('/product', [\App\Http\Controllers\Admin\ProductController::class, 'indexProduct'])->name('admin.indexProduct');
    Route::get('/product/create', [\App\Http\Controllers\Admin\ProductController::class, 'createProduct'])->name('admin.createProduct');
    Route::post('/product/store', [\App\Http\Controllers\Admin\ProductController::class, 'storeProduct'])->name('admin.storeProduct');
    Route::get('/product/edit/{id}', [\App\Http\Controllers\Admin\ProductController::class, 'editProduct'])->name('admin.editProduct');
    Route::patch('/product/edit/{id}', [\App\Http\Controllers\Admin\ProductController::class, 'updateProduct'])->name('admin.updateProduct');
    Route::delete('/product/delete/{id}', [\App\Http\Controllers\Admin\ProductController::class, 'deleteProduct'])->name('admin.deleteProduct');
    //Category
    Route::get('category', [\App\Http\Controllers\Admin\CategoryController::class, 'indexCategory'])->name('admin.indexCategory');
    Route::get('category/create', [\App\Http\Controllers\Admin\CategoryController::class, 'createCategory'])->name('admin.createCategory');
    Route::post('category/create', [\App\Http\Controllers\Admin\CategoryController::class, 'storeCategory'])->name('admin.storeCategory');
    Route::get('category/edit/{id}', [\App\Http\Controllers\Admin\CategoryController::class, 'editCategory'])->name('admin.editCategory');
    Route::patch('category/edit/{id}', [\App\Http\Controllers\Admin\CategoryController::class, 'updateCategory'])->name('admin.updateCategory');
    Route::delete('category/delete/{id}', [\App\Http\Controllers\Admin\CategoryController::class, 'deleteCategory'])->name('admin.deleteCategory');
    //Pays
    Route::get('pays', [\App\Http\Controllers\HomeController::class, 'pay'])->name('admin.pays');
    //FileManager
    Route::get('file-manager', [\App\Http\Controllers\Admin\AdminController::class, 'fileManager'])->name('admin.file-manager');
});
