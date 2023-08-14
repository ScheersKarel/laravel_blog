<?php

namespace App\Http\Controllers;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Contact;
class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::where('user_id', Auth::user()->id)->paginate(15);
       
        return view('contacts', ['contacts' => $contacts]);
    }

    function Add(){
        return view('create');
    }

    function AddContact(Request $req){
       $this->validate($req, [
            'name' => 'required',
            'email' => 'required|email'
        ]   
       );
        $contact = new Contact;
        $contact->user_id = auth()->user()->id;
        $contact->name = $req->name;
        $contact->email = $req->email;
        $contact->save();

        return redirect('contacts')->with('error', 'Contact was created!');
    }
        
    public function edit(int $id){
        try {
            $contact = Contact::findOrFail($id);
            
        } catch (\Throwable $th) {
            return redirect('contacts')->with('error', 'Contact not found!');
        }
        return view('edit', ['contact' => $contact]);
    }

    public function update(Request $req, int $id){
        //dd($id);
        $this->validate($req, [
            'name' => 'required',
            'email' => 'required|email'
        ]);
        
        try{
            $contact = Contact::findOrFail($id);
            $contact->name = $req->input('name');
            $contact->email = $req->input('email');
            $contact->save();

        } catch (\Throwable $th) {
            return redirect('contacts')->with('error', 'Contact not found!');
        }
        return redirect('contacts')->with('error', 'Contact was updated!');     
    }

    public function delete(Request $req, int $id){
        try{
            $contact = Contact::findOrFail($id);
            $contact->delete();
            

        } catch (\Throwable $th) {
            return redirect('contacts')->with('error', 'Contact not found!');
        }
        return redirect('contacts')->with('error', 'Record is deleted!');     
    }
}
