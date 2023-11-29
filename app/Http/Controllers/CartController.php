<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Macaron;

class CartController extends Controller
{
    public function view() {
        $cart = Cart::all();

        return view('cart', compact('cart'));
    }

    public function insert(Macaron $macaron) {
        $cart = new Cart();

        $cart->name = $macaron->name;
        $cart->description = $macaron->description;
        $cart->price = $macaron->price;
        $cart->amount = 1;
        $cart->image_url = $macaron->image_url;
        $cart->save();

        return redirect()->back();
    }
}
