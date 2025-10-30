<?php

use App\Http\Controllers\CityController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductFeatureValueController;
use App\Http\Controllers\ProductGalleryController;
use App\Http\Controllers\ProductGroupController;
use App\Http\Controllers\ProductGroupFeatureController;
use App\Http\Controllers\ProductModelController;
use App\Http\Controllers\ProductPriceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\provinceController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SlideShowController;
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
#Start Main Page Routes
/*Route::get('/', HomeController::class);
Route::get('GetprovinceCities/{pid}',[HomeController::class,'GetprovinceCities']);
Route::get('ProductGroups/{GroupGuid}',[HomeController::class,'ViewProductGroup'])->name('ViewProductGroup');
Route::get('ProductModels/{ModelGuid}',[HomeController::class,'ViewProductModel'])->name('ViewProductModel');
Route::get('AboutUs',[HomeController::class,'AboutUs'])->name('AboutUs');
Route::get('MainPageContactUs',[HomeController::class,'MainPageContactUs'])->name('MainPageContactUs');
Route::get('ViewCart',[HomeController::class,'ViewCart'])->name('ViewCart');*/
#End Main Page Route

//Admin Page Routes
Route::get('profile/admin/dashboard', function () {
    return view('profile.admin.dashboard',[
        'page_header'=>'صفحه اصلی'
    ]);
})->middleware(['auth', 'verified','admin'])->name('dashboard');
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
Route::resource('ProductModels', ProductModelController::class)->parameters([
    'ProductModels' => 'product_model'
]);
Route::resource('Feature',  FeatureController::class)->parameters([
    'Feature' => 'feature'
]);
Route::resource('ProductGroupFeature',  ProductGroupFeatureController::class)
->only(['index', 'store', 'destroy']);
Route::get('/get_product_group_model',[ProductGroupController::class,'get_product_group_model']);
Route::resource('Products', ProductController::class);
Route::get('ProductFeatureValue/{ProductUuid}',[ProductFeatureValueController::class,'index']);
Route::resource('ProductFeatureValue', ProductFeatureValueController::class)
->only('store', 'update', 'destroy');
Route::resource('ProductPrices', ProductPriceController::class)->only('store','show','create');
Route::get('/get_product_prices',[ProductPriceController::class,'get_product_prices']);
Route::get('ProductGallery/{ProductUuid}',[ProductGalleryController::class,'show']);
Route::resource('ProductGallery', ProductGalleryController::class);
Route::get('ContactUs',[SettingController::class,'ContactUsIndex'])->name('AdminContactUs');
Route::get('SiteSetting',[SettingController::class,'index'])->name('SiteSetting');
Route::post('SiteSetting',[SettingController::class,'UpdateSetting'])->name('SiteSettingUpdate');
Route::post('ContactUs',[SettingController::class,'UpdateContactUs'])->name('UpdateContactUs');
Route::resource('SlideShow', SlideShowController::class)->parameters([
    'SlideShow' => 'slide_show'
]);

require __DIR__.'/auth.php';
