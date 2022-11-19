<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Manager\ManagerController;
use App\Http\Controllers\Manager\MenuController;
use App\Http\Controllers\Manager\ProductController;
use Illuminate\Support\Facades\Route;




Route::group( ["controller" =>  AuthController::class , "middleware" => "guest:manager"  ] , function(){


    Route::get("register" ,  "managerRegister");

    Route::post("register" , "managerStore");

    Route::get("login" ,     "managerLogin");

    Route::post("login" ,    "managerAuth");


});



route::group( ["middleware" => "manager:admin"] , function(){

    route::group( ["controller" => ManagerController::class ] , function(){

        Route::get("dashboard" ,  "dashboard");

        Route::get("setting" ,     "setting" );

        Route::post("setting/{id}" ,  "storeSetting");


    });

    Route::get("/logout/{gaurd}" ,  [ AuthController::class , "logout"]);

    Route::resource("/menu" ,  MenuController::class);

    Route::resource("/product" ,  ProductController::class);


});
