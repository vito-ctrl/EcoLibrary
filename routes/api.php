<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BookController;


Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);

Route::apiResource('/category', CategoryController::class);
Route::apiResource('/book', BookController::class);


Route::get('/category/{id}/book', [BookController::class, 'getByCategory']);

Route::get('/books/search', [BookController::class, 'search']);

Route::get('/books/popular', [BookController::class, 'popular']);