<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Contact;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    //
    public function index()
    {
        $categories = Category::all();
        return view('index', compact('categories'));
    }

    public function confirm(ContactRequest $request){
        $contact = $request->only([
            'first_name',
            'last_name',
            'gender',
            'email',
            'tel1',
            'tel2',
            'tel3',
            'address',
            'building',
            'category_id',
            'detail'
        ]);

        $category = Category::find($request->category_id);
        $contact['category_content'] = $category->content;

        session(['contact_input' => $contact]);

        return view('confirm', compact('contact'));
    }

    public function fix(){
        return redirect('/')->withInput();
    }
    
    public function store(Request $request){
         $contact = $request->only(
            'category_id',
            'first_name',
            'last_name',
            'gender',
            'email',
            'address',
            'building',
            'detail'
         );

         $contact['tel'] = $request->tel1 . $request->tel2 . $request->tel3;
         Contact::create($contact);

         return redirect('/thanks');
    }

    public function thanks(){
        return view('thanks');
    }
}
