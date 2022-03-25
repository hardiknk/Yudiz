<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SingerController;
use App\Http\Controllers\SongController;
use App\Http\Controllers\UserController;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use App\Models\Video;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    // $post = Post::find(1)->comments;
    // dd($post);
    // $post->comments()->create([
    //     'user_id'=>'2',
    //     'body' => 'first user post model insert'
    // ]);
    // dd($post->comments);
    // $user = User::create([
    //     'name'=> 'hardikk',
    //     'email'=> 'hardikk@gmail.com',
    //     'password'=> Hash::make('hardik123'),
    // ]);

    // $post = Post::create([
    //     'user_id'=>$user->id,
    //     'title'=>'example title',

    // ]);

    // $post->comments()->create([
    //     'user_id'=> $user->id,
    //     'body'=> 'comment for the post',  

    // ]);

    //insert video table records
    // $video = Video::create([
    //     'title'=>'first video title example',
    // ]);

    // $video->comments()->create([
    //     'user_id'=>'24',
    //     'body'=> 'video first comment '
    // ]);

    //many to many polymorphic reletionship
    // $post = Post::create([
    //     'user_id' => '1',
    //     'title' => 'example many to many polymorphic',
    // ]);

    // $post->tags()->create([
    //     'tag_name'=>'laravel',
    // ]);

    // $post = Post::find(1);
    // $tags = Tag::create([
    //     'tag_name'=>'core php'
    // ]);

    // $post->tags()->attach($tags);

    //create the video records and insert 
    // $video = Video::create([
    //     'title'=>'video many-to-many polymorphic',
    // ]);
    // $tags = Tag::find(1);
    // $video->tags()->attach($tags);

    return view('welcome');
});

//one to one relationshiop demo 
Route::get('getUserDetails', [UserController::class, 'getUserDetails']);

//belong to relationship => inverse of the one to one reletionship
Route::get('getCompanyUser', [CompanyController::class, 'index']);

//one to many relationshiop demo 
Route::get('getUserPhone', [UserController::class, 'getUserPhone']);

//many to many relationship 
// start the add singer intermideate table 
Route::get('add_singer', [SingerController::class, 'add_singer']);
//display the singer name according to song
Route::get('show_song_by_singer', [SongController::class, 'show_song']);
//display the song name according to singer name
Route::get('show_singer_by_song', [SingerController::class, 'show_singer']);
//many to many relationship end

//start the has one through relationship 
//first mechenic => cars => owners 
//here owners is  not direct releted to mechecnic table 
//here cars table is one mechenic_id and owners table has car_id 

Route::get('show_owner_by_mechenic', [OwnerController::class, 'show_owner']);
//end the has-one-through relationship

//start the has many through reletionship
Route::get('show_multiple_owner_by_mechenic', [OwnerController::class, 'show_multiple_owner']);


//one to one polymorphic reletionship
Route::get('get_comment', [PostController::class, 'get_comment']);

//one to many polymorphic reletionship
Route::get('get_comments', [PostController::class, 'get_comments']);
Route::get('get_post_data', [PostController::class, 'get_post_data']);

//many to many polymorphic reletionship 
Route::get('get_tags_by_post', [PostController::class, 'get_tags_by_post']);
Route::get('get_tags_by_video', [PostController::class, 'get_tags_by_video']);

//get the video according to the tag using many to many polymorphic
Route::get('get_video_by_tag', [PostController::class, 'get_video_by_tag']);
