<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;
use App\Http\Middleware\AdminMiddelware;
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
Route::get('/contact', [ContactController::class, 'index']);
//Route::view('/admin/contact', 'admin');


//post routes
Route::post("/send-message", [ContactController::class, 'sendMessage']);

/****Admin Routes****/
Route::middleware(['auth', AdminMiddelware::class])->prefix('admin')->group(function(){
    Route::get('/', [ContactController::class, 'showAllContacts'])
        ->name("admin-panel");
    Route::post('/post', [ProductController::class, "postProduct"]);
    Route::get("/all-products",[ProductController::class,"index"])->name("all-products");

    Route::get("/delete-product/{product}", [ProductController::class, "deleteProduct"])->name("delete-product");
    Route::get("/delete-contact/{contact}",[ContactController::class,"deleteContact"])->name("delete-contact");

    Route::post("/editContact/{contact}",[ContactController::class,'editContact'])->name("edit-contact");
    Route::post("/editProduct/{product}",[ProductController::class,'editProduct'])->name("edit-product");
});
/****Admin Routes End****/



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
