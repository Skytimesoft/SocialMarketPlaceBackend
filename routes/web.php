<?php

use App\Http\Livewire\Admin\Order\OrderView;
use Illuminate\Support\Facades\Auth;
use App\Http\Livewire\Admin\UserList;
use App\Http\Livewire\Admin\UserView;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Admin\Dashboard;
use App\Http\Livewire\Admin\Site\Logo;
use App\Http\Livewire\Admin\SellerList;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Livewire\Admin\Order\OrderList;
use App\Http\Livewire\Admin\Site\LinkStorage;
use App\Http\Controllers\Admin\UserController;
use App\Http\Livewire\Admin\Seller\SellerView;
use App\Http\Controllers\Backend\FaqController;
use App\Http\Controllers\Admin\SellerController;
use App\Http\Livewire\Admin\Product\ProductEdit;
use App\Http\Livewire\Admin\Product\ProductList;
use App\Http\Livewire\Admin\Product\CategoryList;
use App\Http\Livewire\Admin\Product\ProductCreate;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Livewire\Admin\Product\SubCategoryList;
use App\Http\Livewire\Admin\Profile as AdminProfile;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Livewire\Admin\Site\OptimizeApplication;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// Public
Route::get('/', [FrontendController::class, 'index']);
Route::get('/faq', [FrontendController::class, 'faq'])->name('faq');
Route::get('/recommendations', [FrontendController::class, 'recommendations'])->name('recommendations');
Route::get('/selection', [FrontendController::class, 'selection'])->name('selection');
Route::get('/rules', [FrontendController::class, 'rules'])->name('rules');
Route::get('/item/{id}/{slug?}', [FrontendController::class, 'productDetails'])->name('productDetails');
Route::get('/cat/{id}/{slug?}', [FrontendController::class, 'productDetails'])->name('productDetails');

Route::group(['prefix' => 'user', 'as' => 'user'], function() {
    Route::any('{any?}', function () {
        return view('frontend.user-layout');
    })->where('any', '.*');
});

// Auth
Auth::routes();
Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', [HomeController::class, 'home'])->name('home');
    Route::get('/email/verify', [HomeController::class, 'verifyNotice'])->name('verification.notice');
    Route::get('/email/verify/{id}/{hash}', [HomeController::class, 'handleVerification'])->name('verification.verify')->middleware(['signed']);
    Route::post('/email/verify/resend', [HomeController::class, 'verifyResend'])->name('verification.resend')->middleware(['throttle:6,1']);
});


// User only
Route::post('/product/order', [OrderController::class, 'placeOrder'])->name('place.order')->middleware(['auth']);
Route::get('/product/order/modal/view/{id}', [OrderController::class, 'modalView'])->name('buy.modal');


// Admin
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'role:Admin']], function () {
    Route::get('/dashboard', Dashboard::class)->name('admin.dashboard');

    Route::group(['as' => 'faqs.', 'prefix' => 'faqs'], function() {
        Route::get('/', [FaqController::class, 'index'])->name('index');
        Route::get('/create', [FaqController::class, 'create'])->name('create');
        Route::post('/store', [FaqController::class, 'store'])->name('store');
        Route::get('/edit', [FaqController::class, 'edit'])->name('store');
        Route::get('/update', [FaqController::class, 'update'])->name('update');
        Route::post('/delete', [FaqController::class, 'delete'])->name('delete');
    });

    // Buyers routes
    Route::get('/users', UserList::class)->name('admin.user.list');
    Route::get('/user/view/{id}', UserView::class)->name('admin.user.view');

    // Sellers routes
    Route::get('/sellers', SellerList::class)->name('admin.seller.list');
    Route::get('/seller/view/{id}', SellerView::class)->name('admin.seller.view');

    // Products routes
    Route::get('/categories', CategoryList::class)->name('admin.category.list');
    Route::get('/subcategories', SubCategoryList::class)->name('admin.subcategory.list');
    Route::get('/products', ProductList::class)->name('admin.product.list');
    Route::get('/product/new', ProductCreate::class)->name('admin.product.create');
    Route::get('/product/edit/{id}', ProductEdit::class)->name('admin.product.edit');

    // Orders
    Route::get('/orders', OrderList::class)->name('admin.order.list');
    Route::get('/order/view/{id}', OrderView::class)->name('admin.order.view');


    // Site Settings
    Route::get('/site-logo', Logo::class)->name('admin.site.logo');
    Route::get('/link-storage', LinkStorage::class)->name('admin.site.link-storage');
    Route::get('/optimize-application', OptimizeApplication::class)->name('admin.site.optimize-application');


    Route::get('/profile', AdminProfile::class)->name('admin.profile');
});


