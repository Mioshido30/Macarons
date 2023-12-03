<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Macaron;
use App\Models\Cart;

class MacaronController extends Controller
{
    public function home() {
        $macarons = Macaron::all();

        $cart = [];
        $user = Auth::user();
        if(Auth::check()){
            $cart = Cart::where('user_id',$user->id)->get();
        }

        $bestSelling = [];

        if (count($macarons) != 0) {
            $i = $j = 0;
            foreach ($macarons as $macaron) {
                $category = explode('#', $macaron->category);
                $i++;
                if ($category[0] == 'Yes') {
                    $bestSelling[$j] = $macaron;
                    $j++;
                }
            }
        }

        return view('home', compact('cart'))->with('macarons', $bestSelling)->with('user',$user);
    }

    public function shop() {
        $user = Auth::user();
        $macarons = Macaron::all();
        $cart = Cart::where('user_id',$user->id)->get();

        return view('shop', compact('macarons', 'cart','user'));

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
