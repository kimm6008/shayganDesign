<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductDiscountController;
use App\Http\Controllers\ProductFeatureValueController;
use App\Http\Controllers\ProductGalleryController;
use App\Http\Controllers\ProductGroupController;
use App\Http\Controllers\ProductGroupFeatureController;
use App\Http\Controllers\ProductModelController;
use App\Http\Controllers\ProductPriceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProvinceController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SlideShowController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin + User Routes
|--------------------------------------------------------------------------
*/
Route::prefix('profile/admin')->middleware(['auth','verified'])->group(function () {

    // --- Admin Dashboard ---
    Route::get('dashboard', function () {
        return view('profile.admin.dashboard', ['page_header'=>'صفحه اصلی']);
    })->name('dashboard');

    // --- User Dashboard ---
    Route::get('user/dashboard', function () {
        return view('profile.user.dashboard');
    })->name('dashboard.user');

    // --- User Profile Routes ---
    Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // --- Admin Resource Routes ---
    Route::resource('Currencies', CurrencyController::class);
    Route::resource('Cities', CityController::class);
    Route::resource('Provinces', ProvinceController::class);
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
    Route::get('get_product_group_model',[ProductGroupController::class,'get_product_group_model']);
    Route::resource('Products', ProductController::class);
    Route::get('ProductFeatureValue/{ProductUuid}',[ProductFeatureValueController::class,'index']);
    Route::resource('ProductFeatureValue', ProductFeatureValueController::class)
        ->only('store', 'update', 'destroy');
    Route::resource('ProductPrices', ProductPriceController::class)->only('store','show','create');
    Route::resource('ProductDiscount', ProductDiscountController::class)->only('store','show','create');
    Route::get('/get_product_prices',[ProductPriceController::class,'get_product_prices']);
    Route::get('ProductGallery/{ProductUuid}',[ProductGalleryController::class,'show']);
    Route::resource('ProductGallery', ProductGalleryController::class);
    Route::resource('ContactUs',ContactUsController::class)
        ->only('store','index','update')
        ->parameters(['ContactUs' => 'contact_us']);
    Route::resource('AboutUs', AboutUsController::class)
        ->only('store','index','update')
        ->parameters(['AboutUs' => 'about_us']);
    Route::get('SiteSetting',[SettingController::class,'index'])->name('SiteSetting');
    Route::post('SiteSetting',[SettingController::class,'UpdateSetting'])->name('SiteSettingUpdate');
    Route::resource('SlideShow', SlideShowController::class)->parameters([
        'SlideShow' => 'slide_show'
    ]);
});


require __DIR__.'/auth.php';
