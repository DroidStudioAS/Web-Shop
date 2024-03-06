<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(){

        $products = [
            "T-Shirts","Jackets","Shoes"
        ];

        return view('shop', compact("products"));
    }
}
