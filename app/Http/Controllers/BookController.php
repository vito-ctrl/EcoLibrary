<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Http\Requests\BookRequest;

class BookController extends Controller
{
    public function index() {
        $books = Book::all();
        if(!$books){
            return response()->json([
                "success" => false,
                "message" => "no book founded",
            ]);
        } 

        return response()->json([
            "success" => true,
            "data" => $books
        ]);
    }

    public function store(BookRequest $request) {
        $book = Book::create($request->validated());

        return response()->json([
            'message' => 'book created succefuly',
            'data' => $book,
        ], 201);
    }
}
