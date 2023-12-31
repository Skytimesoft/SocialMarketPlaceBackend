<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\Buyer\OrderController;
use App\Http\Controllers\Api\LandingPageController;
use App\Http\Controllers\Backend\FoundController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


// Public
Route::post('/register', [AuthController::class, 'createUser']);
Route::post('/login', [AuthController::class, 'loginUser']);

Route::get('/categories', [LandingPageController::class, 'categories']);
Route::get('/products', [LandingPageController::class, 'productsFiltered']);
Route::post('/product/subscribe', [LandingPageController::class, 'subscribeProduct'])->middleware(['auth:sanctum', 'json']);


// Common
Route::group(['prefix' => 'user', 'middleware' => ['auth:sanctum', 'json']], function () {
    Route::get('/verification-token', function() {
        return response(true);
    });
    Route::get('/get-user', function() {
        return auth()->user();
    });
    Route::get('/get-referral-earnings', [ProfileController::class, 'getReferralEarnings']);
    Route::get('/profile', [ProfileController::class, 'show']);
    Route::put('/profile', [ProfileController::class, 'update']);
    Route::get('/sign-out', [AuthController::class, 'signOut']);

    Route::post('/add-fund-token', [FoundController::class, 'addFundToken']);
    Route::post('/get-fund-history', [FoundController::class, 'getFundHistory']);

    Route::get('/language', [ProfileController::class, 'currentLanguage']);
    Route::put('/language', [ProfileController::class, 'updateLanguage']);
});

// Buyer
Route::group(['prefix' => 'user', 'middleware' => ['auth:sanctum', 'json']], function () {
    Route::get('/orders', [OrderController::class, 'show']);
});








