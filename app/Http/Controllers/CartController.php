<?php

namespace App\Http\Controllers;

use App\Http\Services\CartService;
use App\Models\Cart;
use App\Models\License;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    protected CartService $service;

    public function __construct(CartService $service) {
        $this->service = $service;
    }

    public function index()
    {
        return view('carts.index', ["items"=>CartService::get(Auth::user())]);
    }

    public function add(Product $product)
    {
        if (Cart::where("product_id", $product->id)
            ->where("user_id", Auth::user()->id)->count() >0) {
                return back()->with("error","Item já no carrinho");
        }

        if (License::where("product_id", $product->id)
            ->where('user_id', Auth::user()->id)->count() >0) {
                return back()->with("error","Você já comprou este item");
        }

        if (Product::where('id', $product->id)
            ->where('user_id', Auth::user()->id)->count() > 0) {
                return back()->with("error","Você não pode adicionar seu próprio produto no carrinho");
        }

        $this->service->add($product->id);
        return to_route("cart");
    }

    public function remove(Cart $cart)
    {   
        $this->service->remove($cart);
        return back()->with("success","Item removido com sucesso");
    }
}
