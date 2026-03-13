<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;
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

    public function update(BookRequest $request, $id) {
        $book = Book::find($id);
        if(!$book){
            return response()->json([
                "message" => "book not found",
            ], 422);
        }else{
            $book->update($request->validated());
        }

        return response()->json([
            'message' => 'book updated succefuly',
            'data' => $book,
        ], 201);
    }

    public function destroy($id) {
        $book = Book::find($id);

        if(!$book){
            return response()->json([
                "message" => "book not found",
            ], 422);
        }
        
        $book->delete();

        return response()->json([
            'message' => 'book deleted succefuly',
            'data' => $book,
        ], 201);
    }

    public function getByCategory($id){
        $books = Category::findOrFail($id)->books;

        return response()->json([
            "books" => $books
        ], 201);
    }

    public function search(Request $request){
        $query = $request->title;

        $book = Book::where('title', 'like', "%$query%")->get();

        return response()->json([
            "book" => $book,
        ], 201);
    }

    // public function popular () {

    // }
}
