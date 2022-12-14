<?php

use App\Http\Controllers\Admin\CommentsManagementController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FoodCategoryController;
use App\Http\Controllers\Admin\FoodPartyController;
use App\Http\Controllers\Admin\OrderReportController;
use App\Http\Controllers\Admin\ResturantCategoryController;
use Illuminate\Support\Facades\Route;



Route::group( ["middleware" => "admin:manager"] , function(){


    Route::get('/dashboard', [DashboardController::class ,  "index"]);
    
    Route::resource('/resturant', ResturantCategoryController::class);

    Route::resource('/food',  FoodCategoryController::class);  
    
    Route::resource('/foodParty',  FoodPartyController::class);  


    Route::group((["controller" => CommentsManagementController::class , "prefix" => "comment"] ) ,function(){

        Route::get("/deletes" , "showDeleteRequests");

        Route::delete("/deletes/force/{Comment}" , "forceDeleteRequests");

        Route::post("/deletes/restore/{Comment}" , "restoreDeleteRequests");

    });



    Route::group((["controller" => OrderReportController::class , "prefix" => "report"] ) ,function(){

        Route::get("/order" , "reportAll");

    });

    

});



route::group( ["controller" =>  AuthController::class ] , function(){


Route::get('/login', "adminlogin")->middleware("guest:admin,manager");


Route::post("/login" , "adminAuth")->middleware("guest:admin,manager");


Route::get("/logout/{gaurd}" ,  "logout");


});


