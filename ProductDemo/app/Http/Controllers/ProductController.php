<?php

namespace App\Http\Controllers;

use App\Models\Payments;
use App\Models\Product;
use Exception;
use Razorpay\Api\Api;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $product_data = Product::paginate(12);
        // dd($product_data);
        return view('product.index', ['product_data' => $product_data]);
    }
    public function buyProduct(Request $request)
    {
        // dd($request->input());
        $product_id = $request->product_id;
        $quantity_enter = $request->quantity_enter;

        $product_data  = Product::find($product_id);
        if ($product_data->items <   $quantity_enter) {
            return "no_stock";
        } else {
            Session::put('product_id', $product_id);
            Session::put('quantity_enter', $quantity_enter);
            return "buy_now";
        }
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }

    public function paymentView(Request $request)
    {
        // $product_id  = ;
        $product_data = Product::find(Session::get('product_id'));
        // $prod_price = $product_data->prod_price;
        $quantity  = Session::get('quantity_enter');
        $product_price = $quantity * $product_data->prod_price;
        return view('razorpay.index', ['product_data' => $product_data, 'product_price' => $product_price]);
    }

    public function buyProductF(Request $request)
    {
        // dd($request->input());
        $product_id  = Session::get('product_id');
        $quantity_enter  = Session::get('quantity_enter');

        $input = $request->all();
        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
        // dd($api);
        $payment = $api->payment->fetch($input['razorpay_payment_id']);
        // dd($payment);
        if (count($input)  && !empty($input['razorpay_payment_id'])) {
            try {
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount' => $payment['amount']));
                // dd($response);
                $product_data =  Product::find(Session::get('product_id'));
                $product_data->items = $product_data->items - Session::get('quantity_enter');
                $product_data->save();

                $payment_insert = new Payments();
                // payment_id	payment_done	
                $payment_insert->amount = ($response->amount) / 100;
                $payment_insert->payment_id = $response->id;
                $payment_insert->payment_done = "1";
                $payment_insert->save();
            } catch (Exception $e) {
                return  $e->getMessage();
                Session::put('error', $e->getMessage());
                return redirect()->back();
            }
        }

        // Session::put('success', 'Payment successful');
        return redirect()->route('all_prod')->with('success','Product Purchase Successfully');
    }
}
