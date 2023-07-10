<?php

use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use App\Http\Livewire\Admin\UserList;
use App\Http\Livewire\Admin\UserView;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Admin\Dashboard;
use App\Http\Livewire\Admin\Site\Logo;
use App\Http\Livewire\Admin\SellerList;
use App\Http\Controllers\HomeController;
use App\Http\Livewire\Admin\Site\LinkStorage;
use App\Http\Controllers\Admin\UserController;
use App\Http\Livewire\Admin\Seller\SellerView;
use App\Http\Controllers\Admin\SellerController;
use App\Http\Livewire\Admin\Product\ProductEdit;
use App\Http\Livewire\Admin\Product\ProductList;
use App\Http\Livewire\Admin\Product\CategoryList;
use App\Http\Livewire\Admin\Product\ProductCreate;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Livewire\Admin\Product\SubCategoryList;
use App\Http\Livewire\Admin\Profile as AdminProfile;
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


// Admin
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'role:Admin']], function () {
    Route::get('/dashboard', Dashboard::class)->name('admin.dashboard');

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

    // Site Settings
    Route::get('/site-logo', Logo::class)->name('admin.site.logo');
    Route::get('/link-storage', LinkStorage::class)->name('admin.site.link-storage');
    Route::get('/optimize-application', OptimizeApplication::class)->name('admin.site.optimize-application');


    Route::get('/profile', AdminProfile::class)->name('admin.profile');
});


