<?php

use Illuminate\Support\Facades\Auth;
use App\Http\Livewire\Admin\UserList;
use App\Http\Livewire\Admin\UserView;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Admin\Dashboard;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\SellerController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Livewire\Admin\Profile as AdminProfile;

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
    Route::get('/sellers', [SellerController::class, 'index'])->name('admin.seller.list');

    Route::get('/profile', AdminProfile::class)->name('admin.profile');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
});


