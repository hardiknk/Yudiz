<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use App\Http\Resources\ValidationResource;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Stmt\TryCatch;

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
            'name' => 'required|max:255',
            'email' => 'required|unique:users|max:255|email|email:rfc,dns',
            'password' => 'required|max:255|min:8',
        ]);


        if ($validator->fails()) {
            return $this->validationFailMsg($validator);
        }

        $user_data = new User();
        $user_data->name = $request->name;
        $user_data->email = $request->email;
        $user_data->password = Hash::make($request->password);
        if ($user_data->save()) {

            return (new UserResource($user_data))->additional([
                'meta' => [
                    'status' => Response::HTTP_OK,
                    'message' => "User Created Successfully",
                ]
            ]);
        };
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
        // echo "show is call".$id;
        $user_data = User::find(Auth::user()->id);
        if ($user_data) {

            return (new UserResource($user_data))->additional([
                'meta' => [
                    'status' => Response::HTTP_OK,
                    'message' => "User Information Fetch Successfully",
                ]
            ]);
        } else {
            return $this->someThingWrong("User Not Found");
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
    public function update(Request $request)
    {
        // dd($request->input());
        $validator = Validator::make($request->all(), [
            'email' => 'prohibited',
            'name' => 'required|max:255',
            'password' => 'required|max:255|min:8',
        ], ['email.prohibited' => 'You Can Not Update The User Email']);

        if ($validator->fails()) {
            return $this->validationFailMsg($validator);
        }

        // echo "update call"; exit;
        $user_data = User::find(Auth::user()->id);
        if ($user_data) {
            $user_data->name = $request->name;
            $user_data->password = Hash::make($request->password);
            if ($user_data->save()) {
                return (new UserResource($user_data))->additional([
                    'meta' => [
                        'status' => Response::HTTP_OK,
                        'message' => "User Update Successfully",
                    ]
                ]);
            } else {
                return $this->someThingWrong("User Not Update Something Is Wrong");
            }
        };
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        try {
            $is_user_found = User::find(Auth::user()->id);
            if ($is_user_found) {
                $is_user_found->delete();
                return $this->successMsg("User Delete Successfully");
            } else {
                return $this->someThingWrong("Something Is Wrong User Is Not Deleted");
            }
        } catch (Exception $e) {
            return $this->someThingWrong($e->getMessage());
        }
    }


    public static function validationFailMsg($validator)
    {
        $arr = [
            'data' => null,
            'meta' => [
                "status" =>  Response::HTTP_BAD_REQUEST,
                "message" => $validator->errors()->first(),
            ],
        ];
        return response()->json($arr);
    }

    public function registerUserByOne(Request $request)
    {
        // $validator = Validator::make($request->all(), [
        //     'name' => 'required|max:255',
        //     'email' => 'required|unique:users|max:255|email|email:rfc,dns',
        //     'password' => 'required|max:255|min:8',
        // ]);


        // if ($validator->fails()) {
        //     return $this->validationFailMsg($validator);
        // }

        // dd($request->ips());
        try {
            $user_data = new User();
            $user_data->name = $request->name;
            $user_data->email = $request->email;
            $user_data->password = Hash::make($request->password);
            if ($user_data->save()) {

                return (new UserResource($user_data))->additional([
                    'meta' => [
                        'status' => Response::HTTP_OK,
                        'message' => "User Created Successfully",
                    ]
                ]);
            };
        } catch (Exception $e) {
            return $this->someThingWrong($e->getMessage());
        }
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
