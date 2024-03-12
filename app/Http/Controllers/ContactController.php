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
    //illuminiate/http/request
    public function sendMessage(Request $request){
        $request->validate([
            "subject"=> "required|string",
            "email"=> "required|string",
            "message"=>"required|string|min:5"
        ]);

      ContactModel::create([
          "email"=>$request->get("email"),
          "subject"=>$request->get('subject'),
          "message"=>$request->get("message")
      ]);


      return redirect("/shop");


    }
    public function deleteContact($contact){
        $contactToDelete = ContactModel::where(['id'=>$contact]);

        if(!$contactToDelete){
            return redirect("/");
        }
        $contactToDelete->delete();
        return back();
    }

}
