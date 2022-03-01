<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Color;
use App\Models\Payments;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\Quantity;
use App\Models\Size;
use Exception;
use Razorpay\Api\Api;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     //checking the authenticaiton or not using the constructure 
     public function __construct()
     {
        $this->middleware('auth');
     }

    public function index()
    {
        //
        $product_data = Product::paginate(12);
        // dd($product_data);
        // $color_data = ProductVariant::select('color')->all();
        // $size_data = ProductVariant::select('color')->all();
        return view('product.index', ['product_data' => $product_data]);
    }

    //get a signle product deails 
    public function productDetails(Request $request)
    {
        // dd($request->input());
        // DB::enableQueryLog();
        // $product_quantity =  Quantity::where("product_id", $request->product_id)->groupBy('color_id')->get();
        $product_quantity =  Quantity::where("product_id", $request->product_id)->get();
        if ($product_quantity->isEmpty()) {
            return redirect()->back()->with("danger",'No Product Found');
        }
        else {
            $product_data = Product::find($request->product_id);
            $color_data = Color::all();
            $size_data = Size::all();
    
            return view("product.details", ["color_data" => $color_data, 'size_data' => $size_data, 'product_data' => $product_data]);
        }
       
    }

    public function getProductPrice(Request $request)
    {
        // dd($request->input());
        $is_product =  Quantity::where("product_id", $request->product_id)->where("color_id", $request->color_id)->where('size', $request->size)->first();
        // dd($is_product);
        if ($is_product) {
            return $is_product;
        } else {
            return "no_find";
        }
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


        $input = $request->all();
        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
        // dd($api);
        $payment = $api->payment->fetch($input['razorpay_payment_id']);
        // dd($payment);
        if (count($input)  && !empty($input['razorpay_payment_id'])) {
            try {
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount' => $payment['amount']));
                // dd($response);
                //after done the payment remvoe the items from the cart and and decrese the item in the product tble 
                $cart_data = Cart::query();
                $cart_data = $cart_data->where('user_id', '=', Auth::user()->id)->get();
                // dd($cart_data);
                foreach ($cart_data as $key => $cart_items) {
                    $quantity_minus =   Quantity::where('product_id', $cart_items->product_id)->where('color_id', $cart_items->color)->where('size', $cart_items->size)->first();
                    if ($quantity_minus) {
                        # code...
                        $quantity_minus->item_quantity = $quantity_minus->item_quantity - $cart_items->quantity;
                        $quantity_minus->save();
                    }
                }
                //code for remove the products from the cart 
                $cart_data = Cart::where('user_id', '=', Auth::user()->id)->delete();



                $payment_insert = new Payments();
                ////// payment_id	payment_done	
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

        Session::forget('product_id');
        Session::forget('quantity_enter');
        return redirect()->route('all_prod')->with('success', 'Product Purchase Successfully');
    }
}
