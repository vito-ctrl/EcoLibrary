<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    public function index(){
        $category = Category::all();
        return response()->json([
            "category" => $category,
        ], 201);
    }

    public function store(CategoryRequest $request){
        
        $category = Category::create($request->validated());

        return response()->json([
            'success' => true,
            'message' => 'Category created successfully',
            'data' => $category
        ], 201);
    }

    public function update(CategoryRequest $request, $id){
        
    }

    public function destroy(){

    }
}
