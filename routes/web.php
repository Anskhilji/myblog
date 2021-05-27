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
use App\Http\Controllers\Frontend\ContactUsController;
use App\Http\Controllers\Frontend\PostDetailController;
use App\Http\Controllers\Frontend\errorController;
use App\Http\Controllers\Frontend\CategoryDetailController;
use App\Http\Controllers\Admin\GeneralSettingController;
use App\Http\Controllers\SitemapController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\Admin\CMSController;
use App\Http\Controllers\Admin\AuthorController;
use App\Http\Controllers\Admin\InternalLinksController;
Route::get('sitemap.xml',[SitemapController::class,'_run']);
Route::get('404',[errorController::class,'errorRedirect'])->name('404');

Route::get('/', [HomeController::class,'home'])->name('base_url');

$name = User::first();
$admin = decrypt($name->slug);
define("admin", "$admin");

Route::get(admin, [loginController::class,'Login'])->name('login');
Route::post('login', [loginController::class,'AdminLogin'])->name('admin.login');


//* FOOTER*/
// for fronted email subscription
Route::post('subscriber/store', [SubscriberController::class, 'SubscriberStore'])->name('store.subscriber');
// contact us page frontend
Route::get('contact-us',[ContactUsController::class, 'showContactUs'])->name('contact-us');
Route::post('message-send',[ContactUsController::class, 'SubmitContactUsForm'])->name('contact-us-message');

//Privacy Policy
Route::get('privacy-policy',[CMSController::class, 'PrivacyPlicy'])->name('privacy.policy');

//Terms and Conditions
Route::get('terms-condition',[CMSController::class, 'TermsCondition'])->name('terms.condition');

//faqs
Route::get('faqs',[CMSController::class, 'Faqs'])->name('faqs');


Route::group(['prefix' => admin], function() {
//    Menu
    Route::get('menu', [MenuController::class,'ShowMenu'])->name('menu');
    Route::post('store/menu', [MenuController::class,'StoreMenu'])->name('store.menu');

//    CMS
        Route::get('home', [CMSController::class,'ShowHome'])->name('show.home.schema');
        Route::post('home/store', [CMSController::class,'StoreHome'])->name('store.home.schema');

        Route::get('contact-us', [CMSController::class,'ShowContact'])->name('show.contact.schema');
        Route::post('contact/store', [CMSController::class,'StoreContact'])->name('store.contact.schema');

        Route::get('privacy-policy', [CMSController::class,'ShowPrivacyPolicy'])->name('show.privacy.policy');
        Route::post('/privacy-policy/store', [CMSController::class,'StorePrivacyPolicy'])->name('store.privacy.policy');

        Route::get('terms-condition', [CMSController::class,'ShowTermCondition'])->name('show.terms.condition');
        Route::post('/terms-condition/store', [CMSController::class,'StoreTermCondition'])->name('store.term.condition');

        Route::get('faqs', [CMSController::class,'ShowFaqs'])->name('show.faqs');
        Route::post('/faqs/store', [CMSController::class,'StoreFaqs'])->name('faqs.store');
        Route::post('/faqs/order/store', [CMSController::class,'StoreFaqsOrder'])->name('faqs.order.store');
        Route::get('/faqs/list', [CMSController::class,'FaqsList'])->name('faqs.list');
        Route::delete('/faqs/delete/{faq}', [CMSController::class,'FaqsDelete'])->name('delete.faqs');
        Route::get('/faqs/edit/{id}', [CMSController::class,'FaqsEdit'])->name('edit.faqs');
        Route::post('/faqs/update/{id}', [CMSController::class,'FaqsUpdate'])->name('faqs.update');
        Route::get('/faqs/meta/setting', [CMSController::class,'FaqsMeta'])->name('faqs.meta');
        Route::post('/faqs/meta/store', [CMSController::class,'StoreFaqsMeta'])->name('store.faqs.schema');

//      Author all
    Route::get('author/list', [AuthorController::class, 'ShowAuthor'])->name('show.author');
    Route::get('author/create', [AuthorController::class, 'CreateAuthor'])->name('create.new.author');
    Route::post('author/store', [AuthorController::class, 'StoreAuthor'])->name('store.author');
    Route::get('author/edit/{id}', [AuthorController::class, 'EditAuthor'])->name('edit.author');
    Route::post('author/update/{id}', [AuthorController::class, 'UpdateAuthor'])->name('update.author');
    Route::delete('author/delete/{author}', [AuthorController::class, 'DeleteAuthor'])->name('delete.author');

//     Dashboard
    Route::get('dashboard', [DashboardController::class,'index'])->name('dashboard');
    Route::get('logout', [LogoutController::class,'AdminLogout'])->name('logout');
//    Change Login Info and send email
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
// General Settings
    Route::get('general/setting', [GeneralSettingController::class, 'index'])->name('general.setting');
    Route::post('store/setting/', [GeneralSettingController::class, 'StoreSetting'])->name('store.setting');
//  Internel Links
    Route::get('internal/link', [InternalLinksController::class, 'InternalLink'])->name('internal.links');
    Route::post('internal/link/store', [InternalLinksController::class, 'InternalLinkStore'])->name('internal.links.store');

});

// Post details route
Route::get('/{slug}',function ($slug){
    $identifier = '-';
    $last_id = get_postid("last_id");
    $page_id = get_postid("page_id");
    if (is_numeric($last_id)){
        if ($page_id == 1){
            return (new CategoryDetailController())->CategoryIndex();
        }elseif ($page_id == 2){
            return (new PostDetailController())->PostDetail();
        }elseif ($page_id == 3){
            return (new AuthorController())->AuthorShow();
        }else{
            return redirect()->route('404');
        }
    }else{
        return redirect()->route('404');
    }
});

Route::fallback(function () {
    return redirect()->route('404');
});




