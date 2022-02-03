<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Video;
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

    //get tag data using the post 
    public function get_tags_by_post()
    {
        dd(Post::find(7)->tags);
        // dd(Post::find(1)->tags);
    }

    public function get_tags_by_video()
    {
        dd(Video::find(2)->tags);
    }

    //
    public function get_video_by_tag()
    {
        //here tag id one how many post
        dd(Tag::find(1)->videos);
    }
}
