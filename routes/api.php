<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\ApiCategoryController;
use App\Http\Controllers\Api\ApiAddressController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Category
Route::get('/category', [ApiCategoryController::class, 'getCategory']);
Route::get('/subcategory', [ApiCategoryController::class, 'getSubcategory']);
Route::get('/childcategory', [ApiCategoryController::class, 'getChildcategory']);

// Address
Route::get('/country', [ApiAddressController::class, 'getCountry']);
Route::get('/state', [ApiAddressController::class, 'getState']);
Route::get('/city', [ApiAddressController::class, 'getCity']);
