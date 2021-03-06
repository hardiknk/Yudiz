<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Mail\Message;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\RateLimiter;
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
            'email.exists' => 'The Email Is Not Exists',
        ]);

        if ($validator->fails()) {
            return $this->validationFailMsg($validator->errors()->first());
        }

        $credential = ['email' => $request->email, 'password' => $request->password];

        if (Auth::attempt($credential)) {
            // dd(auth()->user());
            $token = Auth::user()->createToken('myToken')->plainTextToken;
            $auth_token = explode('|', $token)[1];

            return (new UserResource(Auth::user()))->additional([
                'meta' => [
                    'status' => Response::HTTP_OK,
                    'message' => "User Login Successfully",
                    'token' => $auth_token,
                ]
            ]);
        } else {
            return $this->someThingWrong("Invalid Login Credential");
        }
    }

    //forgot password 
    public function forgotPassword(Request $request)
    {
        $validator = Validator::make($request->all(), ['email' => "required|email|max:255"]);

        if ($validator->fails()) {
            return $this->validationFailMsg($validator->errors()->first());
        }
        try {
            $user = User::where('email', $request->email)->first();
            if (!empty($user)) {
                // dd(Password);
                $response = Password::broker()->sendResetLink(['email' => $request->email]);
                // dd($response);
                // dd(RateLimiter::tooManyAttempts('send_password' . $user->id, $perMinute = 5));
                // if (RateLimiter::tooManyAttempts('send_password' . $user->id, $perMinute = 5)) {
                //     return 'Too many attempts!';
                // }

                // if (RateLimiter::tooManyAttempts($user->email, $perMinute = 1)) {
                //    echo "hii";  exit;
                // }

                // dd(RateLimiter::tooManyAttempts($user->email, $perMinute = 1));
                // dd());
                // if (RateLimiter::tooManyAttempts('send-message:' . $user->id, $perMinute = 2)) {
                //     // echo 'hii'; exit;
                //     $seconds = RateLimiter::availableIn('send-message:' . $user->id);

                //     return 'You may try again in ' . $seconds . ' seconds.';
                // }


                // dd($response); //passwords.sent  // passwords.throttled
                // dd(Password::RESET_THROTTLED);
                // if (Password::RESET_THROTTLED) {
                //     $min = str_replace('ago', '', \Carbon\Carbon::now()->subSeconds(config('auth.passwords.users.throttle'))->diffForHumans());

                //     return $this->someThingWrong("Please Wait for The " . $min);
                //     // $this->response['meta']['message']  =  trans('api.password_request_wait', ['entity' => $min]);
                // }

                // dd($user->tokens);
                // if ($user->tokens->recentlyCreatedToken($user)) {
                //     return Password::RESET_THROTTLED;
                // }



                if ($response == Password::RESET_THROTTLED) {
                    $total_second_time = config('auth.passwords.users.throttle');
                    $request_time = DB::table('password_resets')->select('created_at')->where('email', $request->email)->first();
                    // dd($request_time->created_at);
                    $get_diffrent_second =   Carbon::now()->diffInSeconds($request_time->created_at);
                    $after_second = $total_second_time - $get_diffrent_second;
                    return $this->someThingWrong('Wait For ' . $after_second . ' Second To Send Another Forgot Password Request');
                } else 
                if (Password::RESET_LINK_SENT) {
                    // $executed = RateLimiter::attempt(
                    //     "email_send" . $user->email,
                    //     $perMinute = 1,
                    //     function () {
                    //     },
                    //     config('auth.passwords.users.throttle')
                    // );
                    // // dd($executed);
                    // if (!$executed) {
                    //     $seconds = RateLimiter::availableIn("email_send" . $user->email);
                    //     return $this->someThingWrong('Wait For ' . $seconds . ' Second To Send Another Forgot Password Request');
                    // }
                    // dd(Password::RESET_LINK_SENT);

                    return $this->successMsg("Password Reset Link Sent");
                } else {
                    return $this->someThingWrong("Password Reset Link Not Sent");
                }
            } else {
                return $this->someThingWrong("This Email Is Not Found Our Records");
            }
        } catch (Exception $ex) {
            return $this->someThingWrong($ex->getMessage());
        }
    }

    //reset password 
    public function resetPassword(Request $request)
    {

        $validator = Validator::make(
            $request->all(),
            [
                'token' => 'required',
                'email' => 'required|email',
                'password' => 'required|min:8|confirmed'
            ]
        );

        if ($validator->fails()) {
            return $this->validationFailMsg($validator->errors()->first());
        }

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
            return $this->successMsg("Password Reset successfully.");
        }
        return $this->successMsg(__($status));
    }


    //change password 
    public function changePassword(Request $request)
    {

        $userid = auth()->user()->id;
        // dd(Auth::user()->password);
        $validator = Validator::make($request->all(), [
            'old_password' => 'required|max:150',
            'new_password' => 'required|min:8|max:150',
            'confirm_password' => 'required|same:new_password',
        ]);

        if ($validator->fails()) {
            return $this->validationFailMsg($validator->errors()->first());
        } else {
            try {
                if ((Hash::check(request('old_password'), Auth::user()->password)) == false) {
                    return $this->someThingWrong("Check your old password");
                } else if ((Hash::check(request('new_password'), Auth::user()->password)) == true) {
                    return $this->someThingWrong("Please Enter A Password Which Is Not Similar Then Current Password.");
                } else {
                    User::where('id', $userid)->update(['password' => Hash::make(request('new_password'))]);
                    return $this->successMsg("Password updated successfully.");
                }
            } catch (\Exception $ex) {
                $msg = $ex->getMessage();
                return $this->someThingWrong($msg);
            }
        }
    }
    //user logout 
    public function logout(Request $request)
    {
        // dd($request->user()->currentAccessToken());
        try {
            $request->user()->currentAccessToken()->delete();
            return $this->successMsg("Logout Successfully");
        } catch (\Exception $e) {
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

    public function getIpAddress(Request $request)
    {
        dd($request->ip());
    }
}
