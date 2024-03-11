<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use App\Models\ProductModel;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(){

        $products = ProductModel::all();
        return view('shop', compact("products"));
    }
    public function products(){
        $categories = ProductModel::all();

        return view('shop', compact("categories"));
    }
    public function postProduct(Request $request){
            //validation
        $request->validate([
            "dropdown"=>"required|int",
            "product_name"=>"required|string",
            "product_description"=>"required|string",
            "product_amount"=>"required|int",
            "product_price"=>"required|int"
        ]);

        ProductModel::create([
            "cat_id"=>$request->get('dropdown'),
            "product_name"=>$request->get("product_name"),
            "product_description"=> $request->get("product_description"),
            "product_amount"=>$request->get("product_amount"),
            "product_price"=>$request->get("product_price")
        ]);

        return back();
    }
}
