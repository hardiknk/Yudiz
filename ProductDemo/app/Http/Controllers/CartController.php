<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Quantity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    //

    public function AddToCart(Request $request)
    {
        // dd($request->input());
        $product_id = $request->product_id;
        $quantity_enter = $request->quantity_enter;
        $color_id = $request->color_id;
        $size = $request->size;
        // DB::enableQueryLog();
        $quantity_data = Quantity::where([['product_id', $product_id], ['color_id', $color_id], ['size', $size]])->first();

        if ($quantity_data->item_quantity < $quantity_enter) {
            return "no_stock";
        } else {
            $is_already_cart = Cart::where('product_id', $product_id)->where('color', $color_id)->where('size', $size)->where('user_id', Auth::user()->id)->first();
            if ($is_already_cart) {
                $total_product_quantity = $is_already_cart->quantity + $request->quantity_enter;
                //if cart quantity more then product quantity so dispaly error 
                if ($quantity_data->item_quantity <  $total_product_quantity) {
                    return "no_add_cart";
                } else {
                    $is_already_cart->quantity = $is_already_cart->quantity + $request->quantity_enter;
                    $is_already_cart->save();
                    return "successfully_add_to_cart";
                }
            } else {
                $get_quantity_id = Quantity::where('product_id', '=', $product_id)->where('color_id', '=', $color_id)->where('size', '=', $size)->first();
                // dd($get_quantity_id);
                if ($get_quantity_id) {
                    $quantity_id = $get_quantity_id->id;
                }
                $add_to_cart = new Cart();
                $add_to_cart->user_id = Auth::user()->id;
                $add_to_cart->product_id = $product_id;
                $add_to_cart->quantity_id = $quantity_id;
                $add_to_cart->color = $color_id;
                $add_to_cart->size = $size;
                $add_to_cart->quantity = $quantity_enter;
                $add_to_cart->save();
                return "successfully_add_to_cart";
            }
        }
    }


    public function viewCart()
    {
        $cart_items = Cart::query();
        // DB::enableQueryLog();
        // user_id product_id color size quantity
        $cart_items = $cart_items->with('getQuanity')->select('carts.id', 'carts.quantity_id', 'colors.color_name', 'carts.product_id', 'colors.id AS color_id', 'sizes.id as size_id', 'sizes.size', 'carts.user_id', 'carts.quantity')->join('colors', 'colors.id', '=', 'carts.color')->join('sizes', 'sizes.id', '=', 'carts.size')->where('user_id', '=', Auth::user()->id)->get();
        // $cart_items = $cart_items->whereHas('getQuanity', function ($query) {
        //     $query->where('carts.size', '=', '');
        // })->select('carts.id', 'colors.color_name', 'carts.product_id', 'colors.id AS color_id', 'sizes.id as size_id', 'sizes.size', 'carts.user_id', 'carts.quantity')->join('colors', 'colors.id', '=', 'carts.color')->join('sizes', 'sizes.id', '=', 'carts.size')->where('user_id', '=', Auth::user()->id)->get();
        // dd($cart_items);
        // dd($cart_items->isEmpty());
        if ($cart_items->isEmpty()) {
            $cart_items = 0;
        }

        return view("cart.items", ["cart_items" => $cart_items]);
    }
    public function removeCart(Request $request)
    {
        // dd($request->input());
        $cart_remove = Cart::findOrFail($request->id)->delete();
        if ($cart_remove) {
            return redirect()->back()->with('suceess', "Sucessfully Remove The Item From Cart");
        } else {
            return redirect()->back()->with('danger', "Someting Is Wrong");
        }
    }

    //add one more product  in cart 
    public function addOneMore(Request $request)
    {
        // find total quantity of the product 
        $quantity_total = Quantity::where('product_id', $request->product_id)->where('color_id', $request->color_id)->where('size', $request->size_id)->first();
        $cart_add_one = Cart::where('product_id', $request->product_id)->where('color', $request->color_id)->where('size', $request->size_id)->where('user_id', Auth::user()->id)->first();

        $total_product_quantity_after_add  =  $cart_add_one->quantity + 1;
        $total_product_quantity = $quantity_total->item_quantity;
        if ($total_product_quantity <  $total_product_quantity_after_add) {
            return redirect()->back()->with('danger', "Maximum Quantity Limit Reach");
        } else {
            $cart_add_one->quantity = $total_product_quantity_after_add;
            $cart_add_one->save();
            return redirect()->back()->with('success', "Successfully Add The Quantity");
        }
    }

    //remove one more product form the cart by product id 
    public function removeOneMore(Request $request)
    {
        // $cart_remove = Cart::where('product_id', $request->product_id)->where('color', $request->color_id)->where('size', $request->size)->where('user_id', Auth::user()->id)->first();
        $cart_remove = Cart::where('product_id', $request->product_id)->where('color', $request->color_id)->where('size', $request->size_id)->where('user_id', Auth::user()->id)->first();
        // dd($request->input());
        if ($cart_remove) {
            $cart_quantity = $cart_remove->quantity - 1;
            if ($cart_quantity == "0") {
                $cart_remove = Cart::findOrFail($request->id)->delete();
                return redirect()->back()->with('danger', "Quantity Remove Successfully");
            } else {
                $cart_remove->quantity = $cart_quantity;
                $cart_remove->save();
                return redirect()->back()->with('suceess', "Sucessfully Minus The Item From Cart");
            }
        } else {
            return redirect()->back()->with('danger', "Someting Is Wrong");
        }
    }
}
