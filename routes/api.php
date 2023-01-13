<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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
Route::post('/register',[UserController::class,'register']);
Route::get('/login',[UserController::class,'login']);

Route::middleware('auth:sanctum')->group(function(){

    Route::apiResource('tags', TagController::class);
    Route::apiResource('posts',PostController::class);
    Route::get('/posts/trashed',PostController::class,'trashed');
    Route::post('/posts/trashed/{id}',PostController::class,'trashedRestore' );

});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

