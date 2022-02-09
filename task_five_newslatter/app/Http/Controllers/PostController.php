<?php

namespace App\Http\Controllers;

use App\Jobs\NotifyPostToUserJob;
use App\Models\Post;
use App\Models\UserSubscribe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class PostController extends Controller
{
    //
    public function index()
    {
        return view('add_post');
    }

    public function addPost(Request $request)
    {
        $post_data = new Post();
        $post_data->title = $request->title;
        $post_data->description = $request->description;
        if ($post_data->save()) {
            $users_data =  UserSubscribe::where('is_subscribe', '=', '1')->get();
            // dd($users_data);
            $post_description = $post_data->description;
            $post_title = $post_data->title;
            NotifyPostToUserJob::dispatch($users_data, $post_description, $post_title)->delay(now()->addSeconds(5));

            return redirect()->route('add_post')->with('success', 'Post Added Successfully');
        } else {
            return redirect()->route('add_post')->with('danger', 'Someting Is Wrong Post Not Creatd');
        }
    }

   
   
}
