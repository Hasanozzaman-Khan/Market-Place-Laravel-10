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
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\SendMessageController;
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

// Advertisement
Route::get('/ads', [AdvertisementController::class, 'index'])->middleware('auth')->name('ads.index');
Route::get('/ads/create', [AdvertisementController::class, 'create'])->middleware('auth')->name('ads.create');
Route::post('/ads/store', [AdvertisementController::class, 'store'])->middleware('auth')->name('ads.store');
Route::get('/ads/{id}/edit', [AdvertisementController::class, 'edit'])->middleware('auth')->name('ads.edit');
Route::put('/ads/{id}/update', [AdvertisementController::class, 'update'])->middleware('auth')->name('ads.update');
Route::delete('/ads/{id}/delete', [AdvertisementController::class, 'destroy'])->middleware('auth')->name('ads.destroy');


// Profile
Route::get('/profile', [ProfileController::class, 'index'])->middleware('auth')->name('profile.index');
Route::post('/profile/update', [ProfileController::class, 'update'])->middleware('auth')->name('profile.update');

// product
Route::get('/product/{id}/{slug}/show', [FrontendController::class, 'show'])->name('product.show');
Route::get('/product/{categorySlug}', [FrontendController::class, 'findBasedOnCategory'])->name('product.category');
Route::get('/product/{categorySlug}/{subcategorySlug}', [FrontendController::class, 'findBasedOnSubcategory'])->name('product.subcategory');
Route::get('/product/{categorySlug}/{subcategorySlug}/{childcategorySlug}', [FrontendController::class, 'findBasedOnChildcategory'])->name('product.childcategory');


//Message
Route::get('/messages', [SendMessageController::class, 'index'])->name('messages')->middleware('auth');
Route::post('/send/message', [SendMessageController::class, 'store'])->name('messages.store')->middleware('auth');
Route::get('/users', [SendMessageController::class, 'chatWithThisUser'])->name('messages.users')->middleware('auth');
Route::get('/message/user/{id}', [SendMessageController::class, 'showMessages'])->name('messages.show')->middleware('auth');
Route::post('/start-conversation', [SendMessageController::class, 'startConversation'])->name('messages.startConversation')->middleware('auth');





// Route::get('/', function () {
//     return view('index');
// });

Route::get('/home', function () {
    return view('home');
});





/**************** Backend ************************/


Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Admin
Route::group(['prefix'=>'auth', 'middleware'=>'admin'], function(){
    // Route::get('/', function () {
    //     return view('Backend.Admin.index');
    // });
    Route::resource('category', CategoryController::class);
    Route::resource('subcategory', SubcategoryController::class);
    Route::resource('childcategory', ChildcategoryController::class);
});
