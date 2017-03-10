<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
class MailController extends Controller
{


    public function contact()
    {

    	return view('emails.contact')
    	;
    }



    public function send(Request $request)
    {
             

  $rules = [
    
   'name'=>['required','max:32'],
   'email'=>['required','max:32','email'],
   'subject'=>['required','max:100'],
   'mail_message'=>['required','max:2000'],

 
  ];

 $this->validate($request,$rules);

  $data = [

      'name' => $request->name,
      'email' => $request->email,
      'subject' => $request->subject,
      'mail_message' => $request->mail_message,

  ];


  Mail::send('emails.send',$data, function($message){

       $message->to('parvez@larablog.com','Parvez')->subject('Mail Received from larablog');

  });
    notify()->flash('<h2> Thanks for contacting us </h2>','success',['timer'=>2500]);

    return redirect('/');

}

}
