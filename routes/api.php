<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\AuthController;
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




Route::group(["prefix" => "v1" ] , function(){


    Route::group( ["controller" =>  ApiController::class , "middleware" => "auth:api" ] , function(){

        Route::get("/city/all", "cities");

        Route::get("/foodCategory/all", "foodCategory");

        Route::get("/user/all", "users");
            
        Route::get("/user/address/all", "adress");

        Route::put("/user/address/{id}", "updateGeoLocation");

    });


    Route::group(["controller" => AuthController::class] , function(){

        Route::post("/user", "userRegister");

        Route::post("/user/login", "userAuth");

    });


});