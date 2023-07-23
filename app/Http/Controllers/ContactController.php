<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactFormRequest;
use App\Mail\ContactForm;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function showContactForm() {
        return view('contact.contact_form');
    }

    public function contactFrom(ContactFormRequest $request) {

        Mail::to('deniskachumachenko1@gmail.com')->send(new ContactForm($request->validated()));

        return redirect(route('contacts'));
    }
}
