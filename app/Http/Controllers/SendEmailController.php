<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

//user 
use App\Contact; 

use App\Mail\SendMail;

class SendEmailController extends Controller
{
    //index view

    function index()
    {
     return view('send_email');
    }

    //send email with email;
    function send(Request $request)
    {
     $this->validate($request, [
      'name'     =>  'required',
      'email'  =>  'required|email',
      'message' =>  'required'
     ]);
     $contact = new Contact;

     $contact->name = $request->name;
     $contact->email = $request->email;
     $contact->subject = $request->subject;
     $contact->phone_number = $request->phone_number;
     $contact->message = $request->message;
     $contact->save();

        $data = array(
            'name'      =>  $request->name,
            'message'   =>   $request->message
        );

     \Mail::to('jahiduk.alam13@gmail.com')->send(new SendMail($data));
     return back()->with('success', 'Thanks for contacting us!');

    }
}
