<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InformativeController extends Controller
{
    //
    public function contactUs(Request $request)
    {
        return view('front.contact-us');
    }
    public function privacyPolicy(Request $request)
    {
        return view('front.cookie-policy');
    }
    public function cookiePolicy(Request $request)
    {
        return view('front.cookie-policy');
    }
}
