<?php

use App\Http\Controllers\CityController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductFeatureValueController;
use App\Http\Controllers\ProductGroupController;
use App\Http\Controllers\ProductGroupFeatureController;
use App\Http\Controllers\ProductModelController;
use App\Http\Controllers\ProductPriceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\provinceController;
use Illuminate\Support\Facades\Route;

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

Route::get('/',\App\Http\Controllers\Home\HomeController::class);
Route::get('GetprovinceCities/{pid}',[HomeController::class,'GetprovinceCities']);

Route::get('profile/admin/dashboard', function () {
    return view('profile.admin.dashboard',[
        'page_header'=>'صفحه اصلی'
    ]);
})->name('dashboard');//->middleware(['auth', 'verified'])->name('dashboard');
Route::get('profile/user/dashboard', function () {
    return view('profile.user.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::resource('Currencies', CurrencyController::class);
Route::resource('Cities', CityController::class);
Route::resource('Provinces', provinceController::class);
Route::resource('Countries', CountryController::class);
Route::resource('ProductGroups', ProductGroupController::class);
Route::resource('ProductModels', ProductModelController::class);
Route::resource('Feature',  FeatureController::class);
Route::resource('ProductGroupFeature',  ProductGroupFeatureController::class)
->only(['index', 'store', 'destroy']);
Route::get('/get_product_group_model',[ProductGroupController::class,'get_product_group_model']);
Route::resource('Products', ProductController::class);
Route::get('ProductFeatureValue/{ProductUuid}',[ProductFeatureValueController::class,'index']);
Route::resource('ProductFeatureValue', ProductFeatureValueController::class)
->only('store', 'update', 'destroy');
Route::resource('ProductPrices', ProductPriceController::class)->only('store','show','create');
Route::get('/get_product_prices',[ProductPriceController::class,'get_product_prices']);
require __DIR__.'/auth.php';
