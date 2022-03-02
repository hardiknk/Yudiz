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
        // echo "hii index method call i"; exit;
        $validator = Validator::make($request->all(), [
            'email' => 'required|exists:users,email|max:255',
            'password' => 'required|max:255',
        ], $messages = [
            // 'required' => 'The :attribute field is required.',
            'email.exists' => 'The Email Is Not In Our Database',
        ]);

        if ($validator->fails()) {
            $responseArr['message'] = $validator->messages()->first();
            return response()->json($responseArr, Response::HTTP_BAD_REQUEST);
        }


        $is_login =  Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password]);

        if ($is_login) {
            return (new UserResource(Auth::user()))->additional(['meta' => [
                'message' => "User Login Successfully",
                'response_code' => Response::HTTP_OK,
            ]]);
        } else {
            $responseArr['message'] = "Email Or Password Is Incorrect";
            return response()->json($responseArr, Response::HTTP_BAD_REQUEST);
        }
        // $is_login = User::where([['email',$request->email],['password',Hash::check($request->password,)]])->first();
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
            $responseArr['message'] = $validator->messages()->first();
            return response()->json($responseArr, Response::HTTP_BAD_REQUEST);
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
            $responseArr['message'] = "User Is Not Found";
            return response()->json($responseArr, Response::HTTP_OK);
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
            $responseArr['message'] = $validator->messages()->first();
            return response()->json($responseArr, Response::HTTP_BAD_REQUEST);
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
                $responseArr['message'] = "SomeThing Is Wrong";
                return response()->json($responseArr, Response::HTTP_OK);
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
        // echo "destory call".$id;
        // exit;
        //

        $is_user_found = User::find($id);
        // dd($is_user_found);
        // dd($is_user_found);
        if ($is_user_found) {
            $is_user_found->delete();
            $responseArr['message'] = "User Delete Successfully";
            return response()->json($responseArr, Response::HTTP_OK);
        } else {

            $responseArr['message'] = "Something Is Wrong";
            return response()->json($responseArr, Response::HTTP_BAD_REQUEST);
        }
    }
}
