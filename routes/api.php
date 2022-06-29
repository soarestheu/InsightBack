<?php

use Illuminate\Http\Request;

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

Route::group(['prefix' => 'base'], function(){

    Route::get('/', function(){
        return response()->json(["status" => "Online"]);
    });
    
    Route::post('auth/login', 'AuthController@login');
    
    Route::group(['middleware' => ['apiJwt']], function(){
        Route::get('me', "AuthController@me");
        Route::resource("user", "UserController");
        Route::resource("task", "TaskController");
        Route::post("task/change/status", "TaskController@changeStatus");
        Route::post('auth/logout', 'AuthController@logout');
    });
});