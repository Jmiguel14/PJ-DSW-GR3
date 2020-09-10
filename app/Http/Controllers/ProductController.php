<?php

namespace App\Http\Controllers;


use App\Http\Resources\ProductCollection;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Resources\Product as ProductResource;

class ProductController extends Controller
{
    private static $messages = [
        'required' => 'El campo :attribute es obligatorio.'
    ];

    public function index(){
        return new ProductCollection(Product::paginate(10));
    }

    public function show(Product $product){
        return response()->json(new ProductResource($product), 200);
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|string|max:30',
            'description'=>'required|string|max:200',
            'price'=>'required',
            'quantity'=>'required',
            'base'=>'required'
        ], self::$messages);
        $product = Product::create($validatedData);
        return response()->json($product, 201);
    }

    public function update(Request $request, Product $product){
        $product->update($request->all());
        return response()->json($product, 200);
    }

    public function delete(Request $request, Product $product){
        $product->delete();
        return response()->json(null, 204);
    }
}
