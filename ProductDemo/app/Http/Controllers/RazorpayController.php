<?php

namespace App\Http\Controllers;

use Razorpay\Api\Api;
use Illuminate\Http\Request;

class RazorpayController extends Controller
{
    //
    public function index()
    {
        // $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
        // $orderData = [
        //     'receipt'         => 'rcptid_11',
        //     'amount'          => 39900, // 39900 rupees in paise
        //     'currency'        => 'INR'
        // ];

        // $razorpayOrder = $api->order->create($orderData);
        // dd($razorpayOrder);
        # code...
    }
}
