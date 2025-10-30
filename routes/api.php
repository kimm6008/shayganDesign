<?php

use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductGroupController;
use App\Http\Controllers\SlideShowController;
use Illuminate\Http\Request;
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
Route::get('/viewproduct/{id}',[ProductController::class,'apiViewProduct']);
Route::get('/contactus',[HomeController::class,'apiGetContactUsInfo']);
Route::get('/aboutus',[HomeController::class,'apiGetAboutUsInfo']);

