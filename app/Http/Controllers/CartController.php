<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Macaron;

class CartController extends Controller
{
    public function view() {
        $user = Auth::user();
        $cart = Cart::where('user_id',$user->id)->get();

        return view('cart', compact('cart'))->with('user',$user);
    }

    public function insert(Macaron $macaron, Request $request) {

        $find = Cart::where('name', $macaron->name)->get();

        if (count($find) == 0) {
            $cart = new Cart();

            $user = Auth::user();

            $cart->user_id = $user->id;
            $cart->name = $macaron->name;
            $cart->description = $macaron->description;
            $cart->price = $macaron->price;
            $cart->amount = $request['amount'];
            $cart->image_url = $macaron->image_url;
            $cart->save();
        }
        else {
            $cart = Cart::find($find[0]->id);

            $cart->amount += (int) $request['amount'];
            $cart->save();

        }

        return redirect()->back();
    }

    public function addItem($id){

        $cart = Cart::find($id);

        $cart->amount = $cart->amount+1;

        $cart->save();

        return redirect()->back();
    }

    public function redItem($id){

        $cart = Cart::find($id);

        if ($cart->amount > 0) {
            $cart->amount = $cart->amount-1;
            $cart->save();

            if ($cart->amount == 0) {
                $cart->delete();
            }

        }

        return redirect()->back();
    }
}
