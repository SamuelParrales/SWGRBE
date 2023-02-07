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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/products',[App\Http\Controllers\mvc\ProductController::class, 'index'])->name('product.index');
Route::get('/products/create',[App\Http\Controllers\mvc\ProductController::class, 'create'])->name('product.create');
Route::get('/products/{id}',[App\Http\Controllers\mvc\ProductController::class, 'show'])->name('product.show');


// User
Route::get('/profile',[App\Http\Controllers\mvc\user\ProfileController::class,'profile'])->name('user.profile');

// oFFEROR
Route::get('/my-products',[App\Http\Controllers\mvc\user\offeror\MyProductsController::class,'index'])->name('user.offeror.myProducts');

// Admin

Route::get('/admin/products',[App\Http\Controllers\mvc\user\admin\AdminController::class,'productIndex'])->name('user.admin.productIndex');
Route::get('/admin/users',[App\Http\Controllers\mvc\user\admin\AdminController::class,'userIndex'])->name('user.admin.userIndex');
Route::get('/admin/reports',[App\Http\Controllers\mvc\user\admin\AdminController::class,'reportIndex'])->name('user.admin.reportIndex');
