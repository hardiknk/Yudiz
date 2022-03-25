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

        // $user_data =  User::with('getUserCompanyName')->get();
        // dd($user_data);

        //in comapny table id no 2 no of user is not found so what happen 
        //it return the null
        $user_data =  User::find(5)->getUserCompanyName;
        dd($user_data);

        //and if found more then records so first records  is display 

        //     $user_data = User::find(3);
        //    return $user_data->getUserCompanyName;
    }

    public function getUserPhone()
    {
        // return
        // DB::enableQueryLog();
        // User::find(2)->getAllUserPhone;
        // $data =  User::with('getAllUserPhone')->get();
        $data =  User::with('getAllUserPhone')->get();
        // dd($data);
        foreach ($data as $key => $value) {
            echo $value->name . "</br>";
            echo $value->getAllUserPhone . "</br>";
        }
        // dd(DB::getQueryLog());
    }
}
