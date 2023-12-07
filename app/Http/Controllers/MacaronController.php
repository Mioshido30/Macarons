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
        $cart = [];

        if(Auth::check()){
            $cart = Cart::where('user_id',$user->id)->get();
        }

        return view('shop', compact('macarons', 'cart','user'))->with('sort', "Featured");

    }

    public function category($type, $category) {

        if ($type == "macarons") {
            $cats = "";
            $index = 0;
            if ($category == "seasonal") {
                $cats = "Seasonal";
                $index = 1;
            }
            if ($category == "premium") {
                $cats = "Premium";
                $index = 2;
            }
            if ($category == "new") {
                $cats = "New";
                $index = 3;
            }

            $macarons = Macaron::all();
            $categorized = [];

            if (count($macarons) != 0) {
                $i = $j = 0;
                foreach ($macarons as $macaron) {
                    $category = explode('#', $macaron->category);
                    $i++;
                    if ($category[$index] == $cats) {
                        $categorized[$j] = $macaron;
                        $j++;
                    }
                }
            }
        }
        else if ($type == "price") {
            $price = 0;
            if ($category == "100") {
                $price = 100000;
            }
            if ($category == "250") {
                $price = 250000;
            }
            if ($category == "500") {
                $price = 500000;
            }
            if ($category == "1000") {
                $price = 1000000;
            }

            $categorized = Macaron::where('price', '<', $price)->get();
        }
        else if ($type = "flavor") {
            $flavor  = "";
            if ($category == "vanilla") {
                $flavor = "Vanilla";
            }
            if ($category == "chocolate") {
                $flavor = "Chocolate";
            }
            if ($category == "fruity") {
                $flavor = "Fruity";
            }
            if ($category == "rainbow") {
                $flavor = "Rainbow";
            }

            $categorized = Macaron::where('flavor', $flavor)->get();
        }

        $user = Auth::user();
        $cart = [];

        if(Auth::check()){
            $cart = Cart::where('user_id',$user->id)->get();
        }

        return view('shop', compact('cart','user'))->with('macarons', $categorized)->with('sort', "Featured");

    }

    public function filter($filter) {

        if ($filter == "featured") {
            $macarons = Macaron::all();
            $sort = "Featured";
        }
        if ($filter == "low") {
            $macarons = Macaron::query()->orderBy('price', 'asc')->get();
            $sort = "Low to High";
        }
        if ($filter == "high") {
            $macarons = Macaron::query()->orderBy('price', 'desc')->get();
            $sort = "High to Low";
        }

        $user = Auth::user();
        $cart = [];

        if(Auth::check()){
            $cart = Cart::where('user_id',$user->id)->get();
        }

        return view('shop', compact('macarons', 'cart','user'))->with('sort', $sort);
    }

    public function details(Macaron $id) {
        $user = Auth::user();
        $cart = [];

        if(Auth::check()){
            $cart = Cart::where('user_id',$user->id)->get();
        }

        $category = explode('#', $id->category);

        return view('details', compact('cart', 'category', 'user'))->with('macaron', $id);
    }

    public function collections($name) {
        $user = Auth::user();
        $cart = [];

        if(Auth::check()){
            $cart = Cart::where('user_id',$user->id)->get();
        }

        $id = Macaron::where('name',str_replace("%20"," ",$name))->first();

        $category = explode('#', $id->category);
        return view('details', compact('cart', 'category', 'user'))->with('macaron', $id);
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
            'premium' => 'required',
            'new' => 'required',
        ]);

        $macaron = new Macaron();
        $macaron->name = $validate['name'];
        $macaron->description = $validate['description'];
        $macaron->price = $validate['price'];
        $macaron->ratings = $validate['ratings'];
        $macaron->image_url = $validate['image'];
        $macaron->flavor = $validate['flavor'];

        $category = $validate['bestselling'] .'#'. $validate['seasonal'] .'#'. $validate['premium'] .'#'. $validate['new'];
        $macaron->category = $category;

        $macaron->save();

        return redirect()->back();
    }
}
