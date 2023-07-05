<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ProfileController;

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

Route::post('/register', [AuthController::class, 'createUser']);
Route::post('/login', [AuthController::class, 'loginUser']);

// Buyer
Route::group(['prefix' => 'user', 'middleware' => ['auth:sanctum', 'json']], function () {
    Route::get('/profile', [ProfileController::class, 'show']);
    Route::put('/profile', [ProfileController::class, 'update']);
    Route::get('/sign-out', [AuthController::class, 'signOut']);

    Route::get('/language', [ProfileController::class, 'currentLanguage']);
    Route::put('/language', [ProfileController::class, 'updateLanguage']);
});








