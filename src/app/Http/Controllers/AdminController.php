<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function admin(){
        $contacts = Contact::with('category')->Paginate(7);

        return view('admin', compact('contacts'));
    }
}
