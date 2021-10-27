<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ShowController extends Controller
{
    public function show()
    {
        $contacts=Contact::all();
        return view('contacts.index',compact('contacts'));
        
    }
    public function search(Request $request)
    {
        $search= $request->input('search');
        $contacts=Contact::query()
        ->where('first_name','LIKE',"%{$search}%")
        ->orwhere('email','LIKE',"%{$search}%")
        ->get();
        return view('contacts.index',compact('contacts'));
    }
    public function delete($id)
    {
        $contacts=Contact::find($id);
        $contacts->Delete();
        return redirect()->back();
    }
}
