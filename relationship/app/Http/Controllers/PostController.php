<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    
    //one to one polymorphenic here get comments by post id 
    public function get_comment()
    {
        dd(Post::find(1)->comment);
    }

    // using the post model get comment data
    public function get_comments()
    {
        // dd(Post::find(1)->comments);
        dd(Post::find(1)->comments);

        // dd(Post::with('comments')->get());
        // DB::enableQueryLog();
        // $data = Post::with('comments')->get();
        // DB::getQueryLog();
    }

    //using comment model get post data
    public function get_post_data()
    {
        dd(Comment::find(2)->commentable);
    }


}
