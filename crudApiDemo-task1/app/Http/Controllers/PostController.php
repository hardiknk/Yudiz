<?php

namespace App\Http\Controllers;

use App\Http\Resources\CommentResource;
use App\Http\Resources\PostResource;
use App\Models\Comment;
use App\Models\Post;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    //

    public function createPost(Request $request)
    {
        $validator =  Validator::make(
            $request->all(),
            [
                'title' => 'required|max:180|unique:posts,title',
                'description' => 'required',
                // 'img' => 'required|image|max:2048',
            ],
            // ['img.image' => "Please Upload The Image Proper Format"]
        );

        if ($validator->fails()) {
            return $this->validationFailMsg($validator->errors()->first());
        }

        if ($request->hasFile('img')) {
            $file =  $request->file('img');
            $img_name = time() . mt_rand(1, 5000) . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path() . '/postImage';
            $file->move($destinationPath, $img_name);
            // $img_full_path =  $img_name;
            // $img_full_path = asset('public/postImage/' . $img_name);
        }

        try {
            $post_data = new Post();
            $post_data->title = $request->title;
            $post_data->description = $request->description;
            // $post_data->img = $img_name ? $img_name : "null";
            $post_data->img = "null";
            $post_data->user_id = Auth::user()->id;
            $post_data->save();

            return (new PostResource($post_data))->additional([
                'meta' => [
                    'status' => Response::HTTP_OK,
                    'message' => "Post Created Successfully",
                ]
            ]);
        } catch (Exception  $e) {
            return $this->someThingWrong($e->getMessage());
        }
    }

    public function getAllPost()
    {
        try {
            $post_data = Post::withCount('getComment')->orderBy('id','DESC')->paginate(10);
            // $post_data = Post::withCount('getComment')->latest()->paginate(10);
            // dd($post_data);
            return  PostResource::collection($post_data)->additional([
                'meta' => [
                    'status' => Response::HTTP_OK,
                    'message' => "All Post Fetch Successfully",
                ]
            ]);
        } catch (Exception $e) {
            return $this->someThingWrong($e->getMessage());
        }
    }

    public function updatePost(Request $request, $id)
    {
        // dd($request->input());
        $validator =  Validator::make($request->all(), [
            'title' => 'required|max:150|unique:posts,title,' . $id,
            'description' => 'required|max:500',

        ]);
        if ($validator->fails()) {
            return $this->someThingWrong($validator->errors()->first());
        }

        try {
            $post_data = Post::find($id);
            $user_id = Auth::user()->id;

            if (!$post_data) {
                return $this->someThingWrong("Post Is Not Found");
            }

            if ($post_data->user_id != $user_id) {
                return $this->someThingWrong("You Can Update Only Own Post");
            }

            $post_data->title = $request->title;
            $post_data->description = $request->description;
            if ($request->hasFile('img')) {
                $file =  $request->file('img');
                $img_name = time() . mt_rand(1, 5000) . '.' . $file->getClientOriginalExtension();
                $destinationPath = public_path() . '/postImage';
                $file->move($destinationPath, $img_name);
                // $img_full_path = public_path('postImage/' . $img_name);
                $post_data->img = $img_name;
            }

            $post_data->save();
            return (new PostResource($post_data))->additional([
                'meta' => [
                    'status' => Response::HTTP_OK,
                    'message' => "Post Update Successfully",
                ]
            ]);
        } catch (Exception $e) {
            return $this->someThingWrong($e->getMessage());
        }
    }

    public function deletePost(Request $request, $id)
    {
        try {
            $is_post_found = Post::find($id);
            if ($is_post_found) {
                if ($is_post_found->user_id != Auth::user()->id) {
                    return $this->someThingWrong("You Can Not Delete Another User Post");
                }
                $is_post_found->delete();
                return $this->successMsg("Post Delete Successfully");
            } else {
                return $this->someThingWrong("Requested Post Is Not Found");
            }
        } catch (Exception $e) {
            return $this->someThingWrong($e->getMessage());
        }
    }

    public static function validationFailMsg($msg)
    {
        $arr = [
            'data' => null,
            'meta' => [
                "status" =>  Response::HTTP_BAD_REQUEST,
                "message" => $msg,
            ],
        ];
        return response()->json($arr);
    }

    public static function someThingWrong($msg)
    {
        $arr = [
            'data' => null,
            'meta' => [
                "status" =>  Response::HTTP_BAD_REQUEST,
                "message" => $msg,
            ],
        ];
        return response()->json($arr);
    }

    public static function successMsg($msg)
    {
        $arr = [
            'data' => null,
            'meta' => [
                "status" =>  Response::HTTP_OK,
                "message" => $msg,
            ],
        ];
        return response()->json($arr);
    }
}
