<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class PagesControllers extends Controller
{
    public function home() {
        return view("home", ["products"=>Product::all()]);
    }
}
