<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use App\Models\ProductModel;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    /*******Non Admin Functions*******/

    public function index(){

        $products = ProductModel::all();
        return view('shop', compact("products"));
    }
    public function products(){
        $categories = ProductModel::all();

        return view('shop', compact("categories"));
    }


    /*******Admin Functions*******/

}
