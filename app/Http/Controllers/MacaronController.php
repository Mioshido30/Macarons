<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Macaron;
use App\Models\Cart;

class MacaronController extends Controller
{
    public function home() {
        $macarons = Macaron::all();
        $cart = Cart::all();

        if (count($macarons) == 0) {
            return view('home', compact('macarons', 'cart'));
        }

        $i = $j = 0;
        foreach ($macarons as $macaron) {
            $category = explode('#', $macaron->category);
            $i++;
            if ($category[0] == 'Yes') {
                $bestSelling[$j] = $macaron;
                $j++;
            }
        }

        return view('home', compact('cart'))->with('macarons', $bestSelling);
    }

    public function shop() {
        $macarons = Macaron::all();
        $cart = Cart::all();

        return view('shop', compact('macarons', 'cart'));

    }

    public function form(Request $request) {

        $validate = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'ratings' => 'required',
            'image' => 'required',
            'flavor' => 'required',
            'bestselling' => 'required',
            'seasonal' => 'required',
            'limited' => 'required',
            'new' => 'required',
        ]);

        $macaron = new Macaron();
        $macaron->name = $validate['name'];
        $macaron->description = $validate['description'];
        $macaron->price = $validate['price'];
        $macaron->ratings = $validate['ratings'];
        $macaron->image_url = $validate['image'];
        $macaron->flavor = $validate['flavor'];

        $category = $validate['bestselling'] .'#'. $validate['seasonal'] .'#'. $validate['limited'] .'#'. $validate['new'];
        $macaron->category = $category;

        $macaron->save();

        return redirect()->back();
    }
}
