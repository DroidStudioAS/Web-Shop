<?php

namespace App\Http\Controllers;

use App\Models\ContactModel;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /******Non Admin Functions********/

    public function index(){
        return view('contact');
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
    /******Admin Functions********/
    public function showAllContacts(){
        $contacts = ContactModel::all();
        return view('admin', compact('contacts'));
    }
    public function deleteContact($contact){
        $contactToDelete = ContactModel::where(['id'=>$contact]);

        if(!$contactToDelete){
            return redirect("/");
        }
        $contactToDelete->delete();
        return back();
    }
    public function editContact(Request $request, $contactId){
        // Find the contact by its ID
        $contactToEdit = ContactModel::where(['id'=>$contactId])->first();

        if(!$contactToEdit){
            echo "failed";
        }

        // Validate the request data
        $request->validate([
            "email" => "required|string",
            "subject" => "required|string",
            "message" => "required|string"
        ]);

        // Update the attributes of the contact
        $contactToEdit->email = $request->input("email");
        $contactToEdit->subject = $request->input("subject");
        $contactToEdit->message = $request->input("message");

        // Save the changes to the contact
        $contactToEdit->save();

        echo "ok!";
    }

}
