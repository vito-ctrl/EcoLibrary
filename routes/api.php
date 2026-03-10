<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;

Route::post('/tokens/create', function (Request $request) {
    $token = $request->user()->createToken($request->token_name);

    return ['token' => $token->plainTextToken];
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);