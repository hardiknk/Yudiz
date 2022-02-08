<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function home()
    {
        return view('welcome');
    }
    public function about_us()
    {
        return view('welcome');
    }
    public function secret()
    {
        echo url()->current();
        return view('welcome');
    }
}
