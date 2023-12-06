<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\HistoryDetail;
use App\Models\History;

class HistoryController extends Controller
{
    public function insert(Request $req){
        $cart = Cart::where('user_id',$req->id)->get();

        if($cart == null){
            return redirect()->back();
        }

        $history = new History();

        $history->user_id = $req->id;
        $history->transaction_date = date("Y-m-d H:i:s");
        $history->save();

        foreach ($cart as $data) {
            $detail = new HistoryDetail;
            $detail->history_id = $history->id;
            $detail->item_name = $data->name;
            $detail->item_price = $data->price;
            $detail->quantity = $data->amount;
            $detail->save();
        }

        foreach($cart as $data){
            $data->delete();
        }

        return redirect()->back();
    }
}
