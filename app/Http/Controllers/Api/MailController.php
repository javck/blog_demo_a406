<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendMail(Request $request)
    {
        $data = $request->all();
        
        //Laravel Mail 使用方法可參考：https://laravel.com/docs/5.1/mail#sending-mail         
        Mail::send('email.mail', $data, function ($message) use ($data) {
            $message->from(ENV('MAIL_USERNAME', 'mailsend@google.com'), $data['name']);
            $message->to(ENV('MAIL_SUPPORT', 'mailsend@google.com'))->subject('Feedback Mail');
        });
        return "success";
    }
}
