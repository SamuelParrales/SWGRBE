<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
// *******************************************************************MVC
// **********************************************************User
Route::middleware(['auth', 'verified'])->group(function(){
    Route::get('/profile', [App\Http\Controllers\mvc\user\ProfileController::class, 'profile'])->name('user.profile');
    Route::get('/profile/edit',[App\Http\Controllers\mvc\user\ProfileController::class, 'edit'])->name('user.profile.edit');
});
// ******************************** Offeror
Route::middleware(['auth', 'verified','profile:Offeror'])->group(function () {
    Route::get('/products/{id}/edit', [App\Http\Controllers\mvc\ProductController::class, 'edit'])->name('product.edit');
    Route::get('/products/create', [App\Http\Controllers\mvc\ProductController::class, 'create'])->name('product.create');
    Route::get('/my-products', [App\Http\Controllers\mvc\user\offeror\MyProductsController::class, 'index'])->name('user.offeror.myProducts');
});

// ****************************************** Public
Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/products', [App\Http\Controllers\mvc\ProductController::class, 'index'])->name('product.index');
Route::get('/products/{id}', [App\Http\Controllers\mvc\ProductController::class, 'show'])->name('product.show');

// *******************************************Only invite
Auth::routes(['verify' => true]);





// Admin

Route::get('/admin/products', [App\Http\Controllers\mvc\user\admin\AdminController::class, 'productIndex'])->name('user.admin.productIndex');
Route::get('/admin/users', [App\Http\Controllers\mvc\user\admin\AdminController::class, 'userIndex'])->name('user.admin.userIndex');
Route::get('/admin/reports', [App\Http\Controllers\mvc\user\admin\AdminController::class, 'reportIndex'])->name('user.admin.reportIndex');




// *****************************************************************Api  rest
//*****************************************************v1
Route::post('/api/v1/products', [App\Http\Controllers\rest\v1\ProductRestController::class, 'store'])->name('productRestv1.store');
Route::put('/api/v1/products/{id}/recycle', [App\Http\Controllers\rest\v1\ProductRestController::class, 'recycle'])->name('productRestv1.recycle');
Route::put('/api/v1/products/{id}', [App\Http\Controllers\rest\v1\ProductRestController::class, 'update'])->name('productRestv1.update');
Route::delete('/api/v1/products/{id}', [App\Http\Controllers\rest\v1\ProductRestController::class, 'destroy'])->name('productRestv1.destroy');


// User
Route::middleware(['auth'])->group(function () {

    Route::put('/api/v1/profile', [App\Http\Controllers\rest\v1\ProfileRestController::class, 'update'])->name('profileRestv1.update');
    Route::delete('/api/v1/profile', [App\Http\Controllers\rest\v1\ProfileRestController::class, 'destroy'])->name('profileRestv1.destroy');

    Route::put('/api/v1/password',[App\Http\Controllers\rest\v1\PasswordRestController::class,'update'])->name('passwordRestv1.update');

});
