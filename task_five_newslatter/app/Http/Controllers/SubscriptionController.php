<?php

namespace App\Http\Controllers;

use App\Models\UserSubscribe;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    //
    public function subscribe(Request $request)
    {
        // echo '<pre>'; print_r("hii hardik"); exit;

        $is_alreay_subscribe =  UserSubscribe::where('user_email', '=', $request->user_email)->first();
        // dd($is_alreay_subscribe);

        if ($is_alreay_subscribe->is_subscribe == "1") {
            return redirect()->back()->with('danger', 'You Are Already Subscribe The Post Notificatoin');
        } elseif ($is_alreay_subscribe->is_subscribe == "0") {
            $is_alreay_subscribe->is_subscribe = "1";
            $is_alreay_subscribe->save();
            return redirect()->back()->with('success', "You Are Unsubscribe User But Now You Are Subscribe User");
        } else {
            $user_data = new UserSubscribe();
            $user_data->user_email = $request->user_email;
            $user_data->is_subscribe = "1";
            $user_data->save();
            return redirect()->back()->with('success', "Subscribe Successfully");
        }
    }
    public function unsubscribe(Request $request)
    {
        if (!$request->hasValidSignature()) {
            return redirect()->route('news_latter')->with('danger', 'Something Is Wrong Or You Have Not Permission for Change The Other User Subscription');
        }
        // dd($request->input());
        $user_data = UserSubscribe::where('user_email', '=', $request->email)->first();
        if ($user_data) {
            if ($user_data->is_subscribe == "0") {
                return redirect()->route('news_latter')->with('danger', "You Are Already Unsubscribe");
            } else {
                $user_data->is_subscribe = "0";
                $user_data->save();
                return redirect()->route('news_latter')->with('success', "Unsubscribe Successfully");
            }
        } else {
            return redirect()->route('news_latter')->with('danger', "Something Is Wrong");
        }
    }

    public function news_latter()
    {
        return view("newsletter");
    }
}
