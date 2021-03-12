<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\loginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Auth\LogoutController;
use App\Http\Controllers\Admin\Auth\ChangeInfo;
use App\Models\User;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;
//Route::get('/admin', function () {
//    return view('admin.auth.login');
//})->name('login');
Route::get('/', [loginController::class,'Login'])->name('base_url');

$name = User::first();
$admin = decrypt($name->slug);
define("admin", "$admin");

Route::get(admin, [loginController::class,'Login'])->name('login');
Route::post('login', [loginController::class,'AdminLogin'])->name('admin.login');


Route::group(['prefix' => admin], function() {
    Route::get('dashboard', [DashboardController::class,'index'])->name('dashboard');
    Route::get('logout', [LogoutController::class,'AdminLogout'])->name('logout');
//    Chnage Login Info and send email
    Route::get('change/info', [ChangeInfo::class,'ChangeInfo'])->name('change.info');
    Route::post('store/info', [ChangeInfo::class,'StoreChangedInfo'])->name('store.changed.info');
// Category All
    Route::get('all/category', [CategoryController::class,'index'])->name('all.category');
    Route::get('add/category', [CategoryController::class,'AddCategory'])->name('add.category');
    Route::post('store/category', [CategoryController::class,'StoreCategory'])->name('store.category');
    Route::delete('delete/category/{category}', [CategoryController::class,'DeleteCategory'])->name('delete.category');
    Route::get('edit/category/{id}', [CategoryController::class,'EditCategory'])->name('edit.category');
    Route::post('update/category/{id}', [CategoryController::class,'UpdateCategory'])->name('update.category');
// All Blog Post
    Route::get('all/post', [PostController::class,'ShowPost'])->name('all.post');
    Route::get('create/post', [PostController::class,'CreatePost'])->name('create.post');

});

