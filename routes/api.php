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
Route::group(['middleware'=>['cors']],function(){
    Route::post('/register',[App\Http\Controllers\Auth\AuthController::class,'register']);
    Route::post('/login',[App\Http\Controllers\Auth\AuthController::class,'login']);
    
    Route::group(['middleware'=>['auth:sanctum']],function(){
        Route::post('/logout',[App\Http\Controllers\Auth\AuthController::class,'logout']);

        Route::get('/tweet',[\App\Http\Controllers\TweetController::class,'getAllTweets']);
        Route::post('/tweet',[\App\Http\Controllers\TweetController::class,'createTweet']);
        Route::put('/tweet/{id}',[\App\Http\Controllers\TweetController::class,'updateTweetById']);
        Route::delete('/tweet/{id}',[\App\Http\Controllers\TweetController::class,'deleteTweetById']);
    });
});
