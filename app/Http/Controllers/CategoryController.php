<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Resources\Category as CategoryResource;
use App\Http\Resources\CategoryCollection;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        return new CategoryCollection(Category::paginate(10));
    }

    public function show(Category $category){
        return response()->json(new CategoryResource($category), 200);
    }

    public function store(Request $request){
        $category = Category::create($request->all());
        return response()->json($category, 201);
    }

    public function update(Request $request, Category $category){
        $category->update($request->all());
        return response()->json($category, 200);
    }

    public function delete(Request $request, Category $category){
        $category->delete();
        return response()->json(null, 204);
    }
}
