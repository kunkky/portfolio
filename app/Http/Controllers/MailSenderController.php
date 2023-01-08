<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use redirect
use Illuminate\Support\Facades\Redirect;
//import mail support
use Illuminate\Support\Facades\Mail;
//import mailsender
use App\Mail\contact;
use App\Mail\Notification;
use Session;


class MailSenderController extends Controller
{
    //
        function sendMail(Request $request){

        //Validate Here
        $request->validate([
            'name'=>'required',
            'subject'=>'required',
            'email'=>'required',
            'message'=>'required'
        ]);

        //Collect Posted data;
         $details=[
        'name'=>$request->name,
        'email'=>$request->email,
        'subject'=>$request->subject,
        'message'=>$request->message,

        ];
        Mail::to('kunkkykukky@gmail.com')->send (new contact($details));
        //send mail to sender
        Mail::to('kunkkykukky@gmail.com')->send (new notification($details));
        //set flash message

        Session::flash('message', 'mail sent');
        Session::flash('alert-class', 'alert-danger');

        //redirect to contact
        return Redirect::to('/#contactus');
    }

}
