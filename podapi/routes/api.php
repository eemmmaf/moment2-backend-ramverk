<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get("pods", function (){
    return response()->json(['message' => 'GET received']);
});

Route::post("pods", function (){
    return response()->json(['message' => 'POST received']);
});

Route::put("pods", function (){
    return response()->json(['message' => 'PUT received']);
});

Route::delete("pods", function (){
    return response()->json(['message' => 'DELETE received']);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
