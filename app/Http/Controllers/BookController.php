<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

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
}
