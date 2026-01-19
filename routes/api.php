<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductGroupController;
use App\Http\Controllers\ProductModelController;
use App\Http\Controllers\SlideShowController;
use Illuminate\Support\Facades\Route;

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

Route::get('/slideshow',[SlideShowController::class,'apiGetSlideShowWithProductInfo']);
Route::get('/productgroups',[ProductGroupController::class,'apiGetProductGroupsInfo']);
Route::get('/productmodels',[ProductModelController::class,'apiGetProductModelInfo']);
Route::get('/viewproduct/{id}',[ProductController::class,'apiViewProduct']);
Route::get('/contactus',[ContactUsController::class,'apiGetContactUsInfo']);
Route::get('/aboutus',[AboutUsController::class,'apiGetAboutUsInfo']);
Route::get('/allproducts',[ProductController::class,'apiAllProducts']);

