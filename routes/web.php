<?php

use App\Http\Livewire\Admin\Product\ProductCreate;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Livewire\Admin\UserList;
use App\Http\Livewire\Admin\UserView;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Admin\Dashboard;
use App\Http\Livewire\Admin\SellerList;
use App\Http\Livewire\Admin\Product\ProductList;
use App\Http\Livewire\Admin\Product\CategoryList;
use App\Http\Livewire\Admin\Product\SubCategoryList;
use App\Http\Livewire\Admin\Profile as AdminProfile;

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\SellerController;
use App\Http\Controllers\Admin\DashboardController;

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
Route::get('/', function () {
    return view('welcome');
});


// Auth
Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');


// Admin
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'role:Admin']], function () {
    Route::get('/dashboard', Dashboard::class)->name('admin.dashboard');

    // Buyers routes
    Route::get('/users', UserList::class)->name('admin.user.list');
    Route::get('/user/view/{id}', UserView::class)->name('admin.user.view');

    // Sellers routes
    Route::get('/sellers', SellerList::class)->name('admin.seller.list');

    // Products routes
    Route::get('/categories', CategoryList::class)->name('admin.category.list');
    Route::get('/subcategories', SubCategoryList::class)->name('admin.subcategory.list');
    Route::get('/products', ProductList::class)->name('admin.product.list');
    Route::get('/product/new', ProductCreate::class)->name('admin.product.create');

    Route::get('/profile', AdminProfile::class)->name('admin.profile');
});


