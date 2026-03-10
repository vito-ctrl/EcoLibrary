<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(){
        $category = Category::all();
        return response()->json([
            "category" => $category,
        ], 201);
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|string|max:250',
            'description' => 'required|string',
        ]);
        
        $category = Category::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return response()->json([
            "message" => "category saved succefully",
            "category" => $category
        ]);
    }

    public function update(){

    }

    public function destroy(){

    }
}
