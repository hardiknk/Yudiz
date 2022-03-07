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

class CommentController extends Controller
{
    //

    public function getAllComments()
    {
        try {
            $comment_data = Comment::all();
            if ($comment_data->isEmpty()) {
                return $this->someThingWrong("No Comments Are Found");
            }
            return (CommentResource::collection($comment_data))->additional([
                'meta' => [
                    'status' => Response::HTTP_OK,
                    'message' => "Comment Fetch Sucessfully"
                ]
            ]);
        } catch (Exception $e) {
            return $this->someThingWrong($e->getMessage());
        }
    }

    public function createComment(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'comment_text' => 'required',
                'post_id' => 'required|numeric',
            ],
        );

        if ($validator->fails()) {
            return $this->someThingWrong($validator->errors()->first());
        }

        try {
            $is_post_id_available = Post::find($request->post_id);
            if (!$is_post_id_available) {
                return $this->someThingWrong("Post Id Is Not Found");
            }
            $comment_data = new Comment();
            $comment_data->comment_text    = $request->comment_text;
            $comment_data->post_id    = $request->post_id;
            $comment_data->user_id    = Auth::user()->id;
            $comment_data->save();
            return (new CommentResource($comment_data))->additional([
                'meta' => [
                    "status" =>  Response::HTTP_OK,
                    "message" => "Comment Created Successfully",
                ],
            ]);
        } catch (Exception $e) {
            return $this->someThingWrong($e->getMessage());
        }
    }

    //delete the comments 
    public function deleteComment($id)
    {
        // dd($id);

        try {
            $is_delete = Comment::find($id);

            $login_user_id = Auth::user()->id;
            if (!$is_delete) {
                return $this->someThingWrong("Comments Is Not Found for This Id");
            }
            if ($login_user_id != $is_delete->user_id) {

                return $this->someThingWrong("You Can Not Delete Other Users Comments");
            }
            $is_delete->delete();
            return $this->successMsg("Comment Delete Successfully");
        } catch (Exception $e) {
            return $this->someThingWrong($e->getMessage());
        }
    }

    public function updateComment(Request $request, $id)
    {
        // dd("update comment call");
        $validator = Validator::make(
            $request->all(),
            [
                'comment_text' => 'required',
                'post_id' => 'required|numeric',
            ],
        );

        if ($validator->fails()) {
            return $this->someThingWrong($validator->errors()->first());
        }

        try {
            $login_user_id = Auth::user()->id;
            $comment_data = Comment::find($id);
            if (!$comment_data) {
                return $this->someThingWrong("Comment Data Is Not Found");
            }
            if ($comment_data->user_id != $login_user_id) {
                return $this->someThingWrong("Can Not Update Other User Comment");
            }

            $comment_data->comment_text =  $request->comment_text;
            $comment_data->save();
            return (new CommentResource($comment_data))->additional([
                'meta' => [
                    'status' => Response::HTTP_OK,
                    'message' => "Comment Data Is Updated Successfully",
                ]
            ]);
        } catch (Exception $e) {
            return $this->someThingWrong($e->getMessage());
        }
    }


    //function for all common 
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
