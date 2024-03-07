<?php

namespace App\Http\Controllers;

use App\Models\ContactModel;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        return view('contact');
    }
    public function admin(){
        $contacts = ContactModel::all();
        return view('admin', compact('contacts'));
    }
}
