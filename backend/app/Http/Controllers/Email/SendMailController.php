<?php

namespace App\Http\Controllers\Email;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;

class SendMailController extends Controller
{
    public function send_email() {
        $email = 'phamtuan19hd@gmail.com';
        $data = 'phamtuan';
        // return Mail::to($email)->send(new SendMail($data)) ? true : false;
        return view('mails.send_mail');
    }
}
