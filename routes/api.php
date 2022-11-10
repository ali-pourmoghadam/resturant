<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
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


    Route::group( ["controller" =>  UserController::class ] , function(){


        Route::get("/city/all", "cities");

        Route::get("/user/all", "index")->middleware("auth:api");


    });



    Route::group(["controller" => AuthController::class] , function(){

        Route::post("/user", "userRegister");

    });


});