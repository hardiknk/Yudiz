<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SendMailController extends Controller
{
    //
    public function sendEmail()
    {
        // $data = array('name' => "Hardik Kanzariya");

        // Mail::send(['text' => 'mail'], $data, function ($message) {
        //     $message->to('hardik.kanzariya@yudiz.com', 'Tutorials Point')->subject('Laravel Basic Testing Mail');
        //     $message->from('hardik.kanzariya@yudiz.com', 'Hardik Kanzairya');
        // });
        // Mail::raw([], function ($message) {
        //     $message->from('hardik.kanzariya@yudiz.com', 'Yudiz Solution');
        //     $message->to('hardik.kanzariya@yudiz.com');
        //     $message->subject('Welcome To Yudiz');
        // });
        
        Mail::raw('Hi, Welcome Hardik!', function ($message) {
            $message->to("kanzariyahardik8511@gmail.com")
                ->subject("Welcome To  The Yudiz");
        });
    }
}
