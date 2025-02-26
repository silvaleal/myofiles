<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("products.index");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("products.create", ["categorys"=>Category::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            "category_id"=>["required", "numeric"],
            "name"=>['required', 'string', 'min:5', 'max:20'],
            "price"=>["required", "numeric", 'min:1'],
            "description"=>["required","string"],
            "file"=>['required', 'file']
        ], [
            'required' => 'O campo :attribute é obrigatório.',
        ]);

        $filePath = $request->file('file')->store('files', 'public');
        
        $product = Product::create([
            "user_id"=> Auth::user()->id,
            "category_id"=> $validated["category_id"],
            "name"=> $validated["name"],
            "slug"=> Str::slug($validated["name"]),
            "price"=> $validated["price"],
            "description"=> $validated["description"],
            "file_path"=> $filePath
        ]);
        return to_route('product.show', ['product'=>$product]);

    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('products.show', ['product'=> $product]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
