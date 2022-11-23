<?php


use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Api\v1\AddressController;
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


    Route::group( ["middleware" => "auth:api" ] , function(){


        // Route::get("/city", "cities");

     

        // Route::get("/foodCategory", "foodCategory");


        // Route::group(["prefix" => "resturant"] , function(){


        //     Route::get("/", "resturants");

        // });


        Route::group(["prefix" => "user"] , function(){


            // Route::get("/", "users");

          

            Route::resource("address", AddressController::class);
            
        });

 

    });


    Route::group(["controller" => AuthController::class] , function(){

        Route::post("/user", "userRegister");

        Route::post("/user/login", "userAuth");

    });


});