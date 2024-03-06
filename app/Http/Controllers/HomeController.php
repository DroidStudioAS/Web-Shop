<?php

namespace App\Http\Controllers;

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
        return view('welcome', $data);

        //dd($hours), very useful debug method, that does a var dump and then closes the connection
    }
}
