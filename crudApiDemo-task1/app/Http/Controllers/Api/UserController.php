<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Http\Resources\ValidationResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // dd($request->input());
        // name	email	email_verified_at	password	remember_token	created_at	updated_at
        $validator = Validator::make($request->all(), [
            'email' => 'required|unique:users|max:255',
            'name' => 'required|max:255',
            'password' => 'required|max:255',
        ]);


        if ($validator->fails()) {
            $arr = array("status" =>  Response::HTTP_BAD_REQUEST, "message" => $validator->errors()->first());
            return response()->json($arr);
        }

        $user_data = new User();
        $user_data->name = $request->name;
        $user_data->email = $request->email;
        $user_data->password = Hash::make($request->password);
        if ($user_data->save()) {
            return (new UserResource($user_data))->additional(['meta' => [
                'message' => "User Is Created Successfully",
                'response_code' => Response::HTTP_OK,
            ]]);
        };
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        // echo "show is call".$id;
        $user_data = User::find($id);
        if ($user_data) {
            return (new UserResource($user_data))->additional(['meta' => [
                'message' => "User Information",
                'response_code' => Response::HTTP_OK,
            ]]);
        } else {
            $arr = array("status" =>  Response::HTTP_BAD_REQUEST, "message" => "User Is Not Found", "data" => []);
            return response()->json($arr);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'prohibited',
            'name' => 'required|max:255',
            'password' => 'required|max:255',
        ], ['email.prohibited' => 'You Can Not Update The User Email']);


        if ($validator->fails()) {
            $arr = array("status" =>  Response::HTTP_BAD_REQUEST, "message" => $validator->errors()->first());
            return response()->json($arr);
        }
        // echo "update call"; exit;
        $user_data = User::find($id);
        if ($user_data) {
            $user_data->name = $request->name;
            $user_data->password = Hash::make($request->password);
            if ($user_data->save()) {
                return (new UserResource($user_data))->additional(['meta' => [
                    'message' => "User Is Update Successfully",
                    'response_code' => Response::HTTP_OK,
                ]]);
            } else {
                $arr = array("status" =>  Response::HTTP_BAD_REQUEST, "message" => "SomeThing Is Wrong", "data" => []);
                return response()->json($arr);
            }
        };
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $is_user_found = User::find($id);
        if ($is_user_found) {
            $is_user_found->delete();
            $arr = array("status" =>  Response::HTTP_OK, "message" => "User Delete Successfully", "data" => []);
        } else {
            $arr = array("status" =>  Response::HTTP_BAD_REQUEST, "message" => "Something Is Wrongs", "data" => []);
        }
        return response()->json($arr);
    }
}
