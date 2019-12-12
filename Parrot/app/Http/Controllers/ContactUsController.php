<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ContactUS;

class ContactUsController extends Controller
{
    /**
    * Show the application dashboard.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
       return view('contact');
   }
   /**
    * Show the application dashboard.
    *
    * @return \Illuminate\Http\Response
    */
   public function store(Request $request)
   {
       // validate fields
       $this->validate($request, [
        'name' => ['required', 'string'],
        'email' => ['required', 'email'],
        'subject' => ['required', 'string'],
        'message' => ['required', 'string']
    ]);



    // redirect to contact form with message
    session()->flash('success', 'Message is sent! We will get back to you soon!');

    return redirect()->back();

}
}
