<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PhoneUserController extends Controller
{
    //
    public function insertData()
    {
        $user = User::find(3);

        //attach function is only used for the insert the data in pivot table 
        // $mobile_id = [1, 2];
        // $user->getPhones()->attach($mobile_id);

        //sync is add the third table data also
        // $mobile_id = [1, 2];
        // $user->getPhones()->sync($mobile_id);
    }
}
