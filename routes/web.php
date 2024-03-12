<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//welcome stranica
Route::get('/',[\App\Http\Controllers\HomeController::class, 'index']);
Route::view("/about",'about');
Route::get("/shop", [\App\Http\Controllers\ShopController::class, 'index']);
//index is the name of the function to load
Route::get('/contact', [\App\Http\Controllers\ContactController::class, 'index']);
//Route::view('/admin/contact', 'admin');

//admin routes
Route::get('/admin/contact', [\App\Http\Controllers\ContactController::class, 'admin']);
Route::post('/admin/post', [\App\Http\Controllers\ShopController::class, "postProduct"]);
Route::get("/admin/all-products",[\App\Http\Controllers\ProductController::class,"index"]);
Route::get("/admin/delete-product/{product}", [\App\Http\Controllers\ProductController::class, "deleteProduct"])->name("delete-product");


//post routes
Route::post("/send-message", [\App\Http\Controllers\ContactController::class, 'sendMessage']);


