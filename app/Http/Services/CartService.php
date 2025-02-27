<?php

namespace App\Http\Services;

use App\Models\Cart;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class CartService {
    public static function add($productId) {
        
        if (Cart::where("user_id", Auth::user()->id)
                ->where('product_id', $productId)
                ->first()) {return false;}
        
        $cart = Cart::insert([
            "user_id" => Auth::user()->id,
            "product_id" => $productId,
            "added_at" => Carbon::now(),
        ]);
        return $cart;
    }
    public static function remove(Cart $cart) {
        return Cart::where('id', $cart->id)->delete();
    }
    public static function get($user) {
        return Cart::where("user_id", Auth::user()->id)->get();
    }

}