<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact.create');
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
    ]);
    
    $check = Contact::create($data);
    Mail::to('test@test.com')->send(new ContactMail($data));
    
    Return redirect('contact')->with('message', 'Thanks for your message, We will be in touch.');
    
    }
}
