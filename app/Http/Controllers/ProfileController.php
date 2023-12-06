<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

use App\Models\Cart;
use App\Models\History;
use App\Models\Profile;

class ProfileController extends Controller
{
    function index(){

        $user = Auth::user();
        $cart = Cart::where('user_id',$user->id)->get();
        $histories = History::where('user_id',$user->id)->paginate(1);

        return view('profile')->with('user',$user)->with('cart',$cart)->with('histories',$histories);
    }

    function updateProfile(Request $req){

        $validateData = $req->validate([
            'name'=>'required|min:3',
            'phone'=>'required|numeric'
        ]);

        $profile = Profile::find($req->id);
        $profile->name = $validateData['name'];
        $profile->phone = $validateData['phone'];
        $profile->address = $req->address;

        $profile->save();

        return redirect()->back();
    }

    function updatePicture(Request $req){

        if($req->image){
            cloudinary()->destroy('users/'.Auth::user()->email);
            $uploadedFileUrl = $req->file('image')->storeOnCloudinaryAs('users', Auth::user()->email);
            $profile = Profile::find(Auth::user()->id);


            $profile->image_url = cloudinary()->getUrl($uploadedFileUrl->getPublicId());
            $profile->save();
        }

        return redirect()->back();
    }

}
