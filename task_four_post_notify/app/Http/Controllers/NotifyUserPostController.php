<?php

namespace App\Http\Controllers;

use App\Events\NotifyUserEvent;
use App\Jobs\SendNotificationJob;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class NotifyUserPostController extends Controller
{
    //
    public function create_post()
    {
        $post_data = new Post();
        $post_data->post_name = "Test Three Post";

        if ($post_data->save()) {
            //here job directly dispetch 
            $user_data = User::where('is_subscribe', '=', '1')->get();
            // dd($post_data->post_name);
            // dd($user_data);
            //here we dispatch the jobs here direct call the jobs 
            // SendNotificationJob::dispatch($user_data,$post_data->post_name)->delay(now()->addSeconds(5));   

            //after creating the events and listner 
            NotifyUserEvent::dispatch($user_data, $post_data->post_name);
        }
    }
}
