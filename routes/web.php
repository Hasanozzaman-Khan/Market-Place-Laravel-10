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
use App\Http\Controllers\ProfileController;
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

Route::get('/ads', [AdvertisementController::class, 'index'])->middleware('auth')->name('ads.index');
Route::get('/ads/create', [AdvertisementController::class, 'create'])->middleware('auth')->name('ads.create');
Route::post('/ads/store', [AdvertisementController::class, 'store'])->middleware('auth')->name('ads.store');
Route::get('/ads/{id}/edit', [AdvertisementController::class, 'edit'])->middleware('auth')->name('ads.edit');
Route::put('/ads/{id}/update', [AdvertisementController::class, 'update'])->middleware('auth')->name('ads.update');
Route::delete('/ads/{id}/delete', [AdvertisementController::class, 'destroy'])->middleware('auth')->name('ads.destroy');

Route::get('/profile', [ProfileController::class, 'index'])->middleware('auth')->name('profile.index');
Route::post('/profile/update', [ProfileController::class, 'update'])->middleware('auth')->name('profile.update');

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
