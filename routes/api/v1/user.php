<?php


use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Api\v1\AddressController;
use App\Http\Controllers\Api\v1\CartController;
use App\Http\Controllers\Api\v1\ResturantController;
use App\Http\Controllers\Api\v1\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;




Route::group( ["middleware" => "auth:api" ] , function(){
    

  
        Route::group(["controller" => UserController::class], function(){

            Route::get("/", "users");
        
            Route::get("/city", "cities");
            
        });

        Route::group(["controller" => CartController::class], function(){

            Route::post("/addCart", "addToCart");

            Route::get("/getCart", "getCart");

            Route::delete("/delCart", "delCart");
    
        });


        Route::resource("address", AddressController::class);

        Route::resource("resturant", ResturantController::class);

        Route::get("{resturant}/food", [ ResturantController::class , "food"]);
        
});


Route::group(["controller" => AuthController::class] , function(){

    Route::post("/register", "userRegister");

    Route::post("/login", "userAuth");

});
