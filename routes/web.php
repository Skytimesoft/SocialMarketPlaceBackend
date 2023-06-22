<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\SellerController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Livewire\Admin\UserList;

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
Route::group(['prefix' => 'admin', 'middleware' => ['role:Admin']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/users', UserList::class)->name('admin.user.list');
    Route::get('/sellers', [SellerController::class, 'index'])->name('admin.seller.list');
});


// Common
Route::middleware('auth')->group(function () {
    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
});
