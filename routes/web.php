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
// **********************************************************all User
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [App\Http\Controllers\mvc\user\ProfileController::class, 'profile'])->name('user.profile');
    Route::get('/profile/edit', [App\Http\Controllers\mvc\user\ProfileController::class, 'edit'])->name('user.profile.edit');

    //publication

    Route::post('/publications',[App\Http\Controllers\mvc\PublicationController::class,'store'])->name('publication.store');
    Route::post('/comments',[App\Http\Controllers\mvc\CommentController::class,'store'])->name('comment.store');
    Route::put('/comments/{id}',[App\Http\Controllers\mvc\CommentController::class,'update'])->name('comment.update');

});
// ******************************* Moderator and admin
Route::middleware(['auth', 'verified', 'profile:Moderator,Admin'])->group(function () {
    Route::get('/admin/users', [App\Http\Controllers\mvc\user\admin\AdminController::class, 'userIndex'])->name('user.admin.userIndex');
    Route::get('/admin/reports', [App\Http\Controllers\mvc\user\admin\AdminController::class, 'reportIndex'])->name('user.admin.reportIndex');
});
// ****************************** Only Admin
Route::middleware(['auth', 'verified', 'profile:Admin'])->group(function () {
    Route::get('/admin/moderatos/create', [App\Http\Controllers\mvc\user\admin\AdminController::class, 'moderatorCreate'])->name('user.admin.moderatorCreate');
});


// ******************************** only Offeror
Route::get('/email/ban', function () {
    return Auth::user()->profile->banned_at ? view('user.offeror.ban') : abort(404);
})->middleware(['auth', 'verified', 'profile:Offeror'])->name('email.ban');

Route::middleware(['auth', 'verified', 'banned', 'profile:Offeror'])->group(function () {

    Route::get('/products/{id}/edit', [App\Http\Controllers\mvc\ProductController::class, 'edit'])->name('product.edit');
    Route::get('/products/create', [App\Http\Controllers\mvc\ProductController::class, 'create'])->name('product.create');
    Route::get('/my-products', [App\Http\Controllers\mvc\user\offeror\MyProductsController::class, 'index'])->name('user.offeror.myProducts');
});

// ****************************************** Public
Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/publications',[App\Http\Controllers\mvc\PublicationController::class,'index'])->name('publication.index');
Route::get('/publications/{id}',[App\Http\Controllers\mvc\PublicationController::class,'show'])->name('publication.show');
Route::get('/products', [App\Http\Controllers\mvc\ProductController::class, 'index'])->name('product.index');
Route::get('/products/{id}', [App\Http\Controllers\mvc\ProductController::class, 'show'])->name('product.show');


// *******************************************Only invite
Auth::routes(['verify' => true]);

// *****************************************************************Api  rest
//**********************************************************v1
// ***********************************Reports
Route::post('/api/v1/reports', [App\Http\Controllers\rest\v1\ReportRestController::class, 'store'])->name('reportRestv1.store');
Route::delete('/api/v1/reports/{id}', [App\Http\Controllers\rest\v1\ReportRestController::class, 'destroy'])->name('reportRestv1.destroy');
// *********************************** Products
Route::post('/api/v1/products', [App\Http\Controllers\rest\v1\ProductRestController::class, 'store'])->name('productRestv1.store');
Route::put('/api/v1/products/{id}/recycle', [App\Http\Controllers\rest\v1\ProductRestController::class, 'recycle'])->name('productRestv1.recycle');
Route::put('/api/v1/products/{id}', [App\Http\Controllers\rest\v1\ProductRestController::class, 'update'])->name('productRestv1.update');
Route::delete('/api/v1/products/{id}', [App\Http\Controllers\rest\v1\ProductRestController::class, 'destroy'])->name('productRestv1.destroy');


// **************************************Profile
Route::put('/api/v1/profile', [App\Http\Controllers\rest\v1\ProfileRestController::class, 'update'])->name('profileRestv1.update');
Route::delete('/api/v1/profile', [App\Http\Controllers\rest\v1\ProfileRestController::class, 'destroy'])->name('profileRestv1.destroy');

// **************************************Password
Route::put('/api/v1/password', [App\Http\Controllers\rest\v1\PasswordRestController::class, 'update'])->name('passwordRestv1.update');

// **************************************Offerors
Route::put('/api/v1/offerors/{id}/ban', [App\Http\Controllers\rest\v1\OfferorRestController::class, 'ban'])->name('offerorRestv1.ban');
Route::put('/api/v1/offerors/{id}/unban', [App\Http\Controllers\rest\v1\OfferorRestController::class, 'unban'])->name('offerorRestv1.unban');

// **************************************Moderators
Route::delete('/api/v1/moderators/{id}', [App\Http\Controllers\rest\v1\ModeratorRestController::class, 'destroy'])->name('moderatorRestv1.destroy');
Route::post('/api/v1/moderators/', [App\Http\Controllers\rest\v1\ModeratorRestController::class, 'store'])->name('moderatorRestv1.store');


// Publications
Route::put('/api/v1/publications/{id}',[App\Http\Controllers\rest\v1\PublicationRestController::class,'update'])->name('publicationRestv1.update');
Route::delete('/api/v1/publications/{id}',[App\Http\Controllers\rest\v1\PublicationRestController::class,'destroy'])->name('publicationRestv1.destroy');


// Comments
Route::delete('/api/v1/comments/{id}',[App\Http\Controllers\rest\v1\CommentRestController::class,'destroy'])->name('commentRestv1.destroy');
