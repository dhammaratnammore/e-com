<?php

namespace App\Http\Controllers;

use App\Models\contact_model;
use Illuminate\Http\Request;


class contact_controller extends Controller
{
    public function contactdetail(Request $request){
        $contact = new contact_model();
        $contact->name = $request->name;
        $contact->phone = $request->phone;
        $contact->email = $request->email;
        $contact->massage = $request->massage;
        $contact->save();
        return redirect("/contact")->with("success","your registration has been succcesfull!");
        
    }
}
 