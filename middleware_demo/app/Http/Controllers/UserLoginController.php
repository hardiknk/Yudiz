<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserLoginController extends Controller
{
    //
    public function loginForm()
    {
        return view('user.login');
    }
    public function checkUser(Request $request)
    {

        $credentials = $request->only('email', 'password');

        if (Auth::guard('web')->attempt($credentials)) {
            // dd(Auth::user());
            if (Auth::user()->is_admin == "1") {
                return view('admin.welcome');
            } else {
                return view("user.welcome");
            }
        } else {
            return redirect()->back();
        }
    }

    public function adminUser()
    {
        return view('admin.welcome');
    }

    public function normal_user()
    {
        return view("user.welcome");
    }
}
