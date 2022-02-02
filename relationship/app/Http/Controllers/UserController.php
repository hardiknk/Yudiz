<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use DB;

class UserController extends Controller
{
    //

    // public function getUserDetails()
    // {

    // }
    public function getUserDetails()
    {

        User::with('getUserCompanyName')->get()->dd();
    }

    public function getUserPhone()
    {
        // return
        DB::enableQueryLog();
        // User::find(2)->getAllUserPhone;
        User::with('getAllUserPhone')->get();
        dd(DB::getQueryLog());
    }
}
