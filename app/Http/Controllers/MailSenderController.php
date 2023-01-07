<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use redirect
use Illuminate\Support\Facades\Redirect;
use Session;


class MailSenderController extends Controller
{
    //
        function sendMail(Request $req){

        //Validate Here
        $req->validate([
            'name'=>'required',
            'subject'=>'required',
            'email'=>'required',
            'message'=>'required'
        ]);

        //return "form data will be here";
        $form_message= $req->input();
        //redirect home with flash message
        Session::flash('message', '$form_message');
        Session::flash('alert-class', 'alert-danger');
        return Redirect::to('/#contactus');
    }

}
