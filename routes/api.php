<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use phpDocumentor\Reflection\DocBlock\Tags\Uses;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// public
    // User
Route::post('users', [UserController::class, 'register']);
Route::post('users', [UserController::class, 'login']);
    // Post
Route::get('posts', [PostController::class,'index']);
Route::get('posts/{id}', [PostController::class,'show']);

// private 
Route::group(['middleware'=>['auth:sanctum']],function(){
    // User
    Route::post('users', [UserController::class, 'logout']);
    // Post
    Route::post('posts', [PostController::class, 'store']);
    Route::put('posts/{id}', [PostController::class, 'update']);
    Route::post('posts/{id}', [PostController::class, 'destroy']);

});