<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactFormController extends Controller
{
    // Create Contact Form
    public function createForm(Request $request) {
        return view('contact');
    }
    // Store Contact Form data
    public function ContactForm(Request $request)
    {
        // Form validation
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'subject' => 'required',
            'message' => 'required'
        ]);
        //  Store data in database
        Contact::create($request->all());
        //Send mail
        \Mail::send('mail', array(
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'phone' => $request->get('phone'),
            'subject' => $request->get('subject'),
            'user_query' => $request->get('message'),
        ), function($message) use ($request){
            $message->from($request->email);
            $message->to('marie.preault@orange.fr', 'Admin')->subject($request->get('subject'));
        });

        return back()->with('success', 'Nous avons bien reçu votre message et reviendrons vers vous');
    }
}
