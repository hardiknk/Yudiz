<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Exception;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Mail\Message;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
// use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AuthController extends Controller
{

    //user login 

    public function userLogin(Request $request)
    {
        // echo "hii index method call i"; exit;
        $validator = Validator::make($request->all(), [
            'email' => 'required|exists:users,email|max:255',
            'password' => 'required|max:255',
        ],  [
            'email.exists' => 'The Email Is Not In Our Database',
        ]);

        if ($validator->fails()) {
            $arr = array("status" =>  Response::HTTP_BAD_REQUEST, "message" => $validator->messages()->first(), "data" => []);
            return response()->json($arr);
        }

        $credential = ['email' => $request->email, 'password' => $request->password];

        if (Auth::attempt($credential)) {
            // dd(auth()->user());
            $token = Auth::user()->createToken('myToken')->plainTextToken;
            return (new UserResource(Auth::user()))->additional(['meta' => [
                'message' => "User Login Successfully",
                'response_code' => Response::HTTP_OK,
                'token' => $token,
            ]]);
        } else {
            $arr = array("status" =>  Response::HTTP_BAD_REQUEST, "message" => "Email Or Password Is Incorrect", "data" => []);
            return response()->json($arr);
        }
    }

    //forgot password 
    public function forgotPassword(Request $request)
    {
        $validator = Validator::make($request->all(), ['email' => "required|email",]);
        if ($validator->fails()) {
            $arr = array("status" => 400, "message" => $validator->errors()->first());
        }

        try {
            $user = User::where('email', $request->email)->first();
            if (!empty($user)) {
                $response = Password::broker()->sendResetLink(['email' => $request->email]);
                // dd($response);
                if (Password::RESET_LINK_SENT) {
                    $arr = array("status" => 200, "message" => "Password Reset Link Sent");
                } else {
                    $arr = array("status" => 400, "message" => "Password Reset Link Not Sent");
                }
            } else {
                $arr = array("status" => 400, "message" => "User Not Found");
            }
        } catch (Exception $ex) {
            $arr = array("status" => 400, "message" => $ex->getMessage());
        }
        return response()->json($arr);
    }

    //reset password 
    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));
                $user->save();
                event(new PasswordReset($user));
            }
        );

        if ($status == Password::PASSWORD_RESET) {

            return response(['message' => "Password Reset Succssfully", 200]);
        }

        return response([
            'message' => __($status)
        ], 500);
    }


    //change password 
    public function changePassword(Request $request)
    {

        $userid = auth()->user()->id;
        // dd(Auth::user()->password);
        $validator = Validator::make($request->all(), [
            'old_password' => 'required',
            'new_password' => 'required|min:6',
            'confirm_password' => 'required|same:new_password',
        ]);

        if ($validator->fails()) {
            $arr = array("status" => 400, "message" => $validator->errors()->first(), "data" => []);
        } else {
            try {
                if ((Hash::check(request('old_password'), Auth::user()->password)) == false) {
                    $arr = array("status" => 400, "message" => "Check your old password.", "data" => []);
                } else if ((Hash::check(request('new_password'), Auth::user()->password)) == true) {
                    $arr = array("status" => 400, "message" => "Please Enter A Password Which Is Not Similar Then Current Password.", "data" => []);
                } else {
                    User::where('id', $userid)->update(['password' => Hash::make(request('new_password'))]);
                    $arr = array("status" => 200, "message" => "Password updated successfully.", "data" => []);
                }
            } catch (\Exception $ex) {
                $msg = $ex->getMessage();
                $arr = array("status" => 400, "message" => $msg, "data" => []);
            }
        }
        return response()->json($arr);
    }
    //user logout 
    public function logout(Request $request)
    {
        // dd($request->user()->currentAccessToken());
        try {
            $request->user()->currentAccessToken()->delete();
            return response([
                'message' => 'Successfully Logout',
            ]);
        } catch (\Exception $e) {
            $this->storeErrorLog($e, 'Logout', 'Logout Fail');
        }
    }
}
