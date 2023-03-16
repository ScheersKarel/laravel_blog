<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
class ContactController extends Controller
{
    function AddContact(Request $req){
        $contact = new Contact;
        $contact->user_id = auth()->user()->id;
        $contact->name = $req->name;
        $contact->email = $req->email;
        $contact->save();

        return redirect('contacts');
    }
}
