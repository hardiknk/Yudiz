<?php

namespace App\Http\Controllers;

use App\Events\SomeOneCheckedProfile;
use App\Models\User;
use Illuminate\Http\Request;

class EventListerController extends Controller
{
    //
    public function sendEamil()
    {
        $user = User::inRandomOrder()->first();

        //first way using the global event() function to send 
        // event(new SomeOneCheckedProfile($user));
        
        //second way using the dispatch method
         event(new SomeOneCheckedProfile($user));
    //    $data =  SomeOneCheckedProfile::dispatch($user);
       
        // return $user->email;    
    
        
    }
}
