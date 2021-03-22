<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\loginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Auth\LogoutController;
use App\Http\Controllers\Admin\Auth\ChangeInfo;
use App\Models\User;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Admin\SubscriberController;
//Route::get('/home', function () {
//    return view('frontend.layouts.app');
//});
Route::get('/', [HomeController::class,'home'])->name('base_url');

$name = User::first();
$admin = decrypt($name->slug);
define("admin", "$admin");

Route::get(admin, [loginController::class,'Login'])->name('login');
Route::post('login', [loginController::class,'AdminLogin'])->name('admin.login');

Route::post('subscriber/store', [SubscriberController::class, 'SubscriberStore'])->name('store.subscriber');

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
    Route::post('store/post', [PostController::class,'StorePost'])->name('store.post');
    Route::get('post/edit/{id}', [PostController::class,'PostEdit'])->name('post.edit');
    Route::post('post/update/{id}', [PostController::class,'PostUpdate'])->name('update.post');
// Draft or publish
    Route::get('post/draft/{id}', [PostController::class,'PostDraft'])->name('post.draft');
    Route::get('post/publish/{id}', [PostController::class,'PostPublish'])->name('post.publish');
    Route::get('post/draft', [PostController::class,'PostAllDraft'])->name('all.draft.post');
    Route::get('post/publish', [PostController::class,'PostAllPublish'])->name('all.publish.post');


//    DELETE POST
    Route::delete('post/delete/{post}', [PostController::class,'PostDelete'])->name('post.delete');


//    Subscribers List All Routes
    Route::get('subscriber/list', [SubscriberController::class, 'SubscriberList'])->name('subscriber.list');
    Route::get('subscriber/edit/{id}', [SubscriberController::class, 'SubscriberEdit'])->name('edit.subscriber');
    Route::post('subscriber/store/{id}', [SubscriberController::class, 'SubscriberUpdate'])->name('update.subscriber');
    Route::delete('subscriber/delete/{subscriber}', [SubscriberController::class, 'SubscriberDelete'])->name('delete.subscriber');
//   send email
    Route::get('send/email', [SubscriberController::class, 'SendEmailShowList'])->name('send.email');
    Route::post('send/email-to-subscribers', [SubscriberController::class, 'SendEmailToSubscriberd'])->name('send.email.to.subscribers');

});

