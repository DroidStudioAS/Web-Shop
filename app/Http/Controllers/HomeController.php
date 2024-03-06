<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $currentTime = date('h:i:s');
        //this is how u do it for data objects with multiple values
        // $data = ['time'=> $currentTime];
        //return view('welcome', $data);
        //if returning a single value, this is better
        return view('welcome', compact('currentTime'));
    }
}
