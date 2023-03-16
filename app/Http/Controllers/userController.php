<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class userController extends Controller
{
    public function index()
    {
        $contacts = Contact::all();
       
        return view('contacts', ['contacts' => $contacts]);
    }
  

}
