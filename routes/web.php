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
Route::get('/', function () {
    return view('welcome');
});
Route::view("/about",'about');
Route::view("/shop",'shop');
Route::view("/contact",'contact');

