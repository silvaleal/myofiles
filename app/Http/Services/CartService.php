<?php

namespace App\Http\Services;

use App\Models\Cart;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class CartService {
    public static function add($productId, $quantify) {
        
        if (Cart::where("user_id", Auth::user()->id)
                ->where('product_id', $productId)
                ->first()) {return false;}
        
        $cart = Cart::insert([
            "user_id" => Auth::user()->id,
            "product_id" => $productId,
            "quantify" => $quantify,
            "added_at" => Carbon::now(),
        ]);
        return $cart;
    }
    public static function remove(Request $request): void {

    }
    public static function get($user) {
        return Cart::where("user_id", Auth::user()->id)->get();
    }

}