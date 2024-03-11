<?php

namespace App\Http\Controllers;

use App\Models\ProductModel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $hours = date('h');
        $minutes = date("i");
        $seconds = date('s');
        //this is how u do it for data objects with multiple values
        $data = ['hours'=> $hours, 'minutes'=>$minutes, 'seconds'=>$seconds];
        //return view('welcome', $data);
        //if returning a single value, this is better
        $last6products = ProductModel::orderByDesc("id")->take(6)->get();


        return view('welcome', compact("data", 'last6products'));

        //dd($hours), very useful debug method, that does a var dump and then closes the connection
    }
}
