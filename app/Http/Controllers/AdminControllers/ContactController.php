<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Mail\UserContactMail;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function newMessage()
    {
        $contacts = Contact::with('user')->where('reply', null)->get();
        return view('admin.contact.index' , compact('contacts'));
    }

    public function showMessage(Contact $contact)
    {
        return view('admin.contact.show' , compact('contact'));
    }

    public function update(Request $request , Contact $contact)
    {
        Mail::to($request->email)->send( new UserContactMail($request->reply));
        $contact->update(['reply' => $request->reply]);
        return redirect()->route('admin.contacts.index');
    }

    public function allMessage()
    {
        $contacts = Contact::with('user')->get();
        return view('admin.contact.all-message' , compact('contacts'));
    }
}
