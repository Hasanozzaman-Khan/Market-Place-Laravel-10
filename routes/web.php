<?php

use Illuminate\Support\Facades\Route;
// use Illuminate\Support\Facades\View;

/**************** Backend ************************/
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\ChildcategoryController;

/**************** Frontend ************************/
use App\Http\Controllers\MenuController;
use App\Http\Controllers\AdvertisementController;
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


/**************** Frontend ************************/
Route::get('/', [MenuController::class, 'menu']);
Route::get('/ads/create', [AdvertisementController::class, 'create']);
Route::post('/ads/store', [AdvertisementController::class, 'store'])->name('ads.store');

// Route::get('/', function () {
//     return view('index');
// });

Route::get('/home', function () {
    return view('home');
});





/**************** Backend ************************/
Route::get('/auth', function () {
    return view('Backend.Admin.index');
});

Route::get('/dashboard', [DashboardController::class, 'index']);

// Admin
Route::group(['prefix'=>'auth'], function(){
    Route::resource('category', CategoryController::class);
    Route::resource('subcategory', SubcategoryController::class);
    Route::resource('childcategory', ChildcategoryController::class);
});
