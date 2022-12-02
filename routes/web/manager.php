<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Manager\ManagerCommentController;
use App\Http\Controllers\Manager\ManagerCommentResponseController;
use App\Http\Controllers\Manager\ManagerController;
use App\Http\Controllers\Manager\ManagerOrderController;
use App\Http\Controllers\Manager\ManagerOrderReportController;
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

        Route::post("markNotifications/{id}" ,  "markNotifications");

        Route::get("setting" ,     "setting" );

        Route::post("setting/{id}" ,  "storeSetting");


    });


    route::group( ["controller" => ManagerCommentResponseController::class ] , function(){

        Route::delete("comment/user/delete/{comment}" ,  "destroy");

        Route::post("comment/user/confirm/{comment}" ,  "confirm");

    });



    route::group( ["controller" => ManagerOrderController::class ] , function(){

        Route::get("order" ,  "orders");

        Route::put("order/status/{id}" ,  "orderStatusUpdate");

    });


    route::group( ["controller" => ManagerOrderReportController::class ] , function(){

        Route::get("report" ,  "reportAll");

        Route::post("report/filter" ,  "orderBy");

    });


    Route::get("/logout/{gaurd}" ,  [ AuthController::class , "logout"]);

    Route::resource("/menu" ,  MenuController::class);

    Route::resource("/product" ,  ProductController::class);

    Route::resource("/comment" ,  ManagerCommentController::class);


});
