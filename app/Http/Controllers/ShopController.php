<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(){

        $categories = ProductCategory::all();
        return view('shop', compact("categories"));
    }
}
