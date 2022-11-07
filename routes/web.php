<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FoodCategoryController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\ResturantCategoryController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




Route::get('/', function () {

    return view('welcome');

});





Route::group(['prefix' => 'manager'] , function(){



    route::group( ["controller" =>  AuthController::class , "middleware" => "guest"  ] , function(){


        Route::get("register" ,  "managerRegister");

        Route::post("register" , "managerStore");

        Route::get("login" ,     "managerLogin");

        Route::post("login" ,    "managerAuth");


    });

    route::group( ["middleware" => "manager"] , function(){

        Route::get("dashboard" , [ ManagerController::class , "dashboard"]);

    });





});


Route::group([ 'prefix' => 'admin'], function(){



           route::group( ["middleware" => "admin"] , function(){


                Route::get('/dashboard', [AdminController::class ,  "dashboard"]);
                
                Route::resource('/resturant', ResturantCategoryController::class);
        
                Route::resource('/food',  FoodCategoryController::class);  

            });


            

        

        route::group( ["controller" =>  AuthController::class ] , function(){


            Route::get('/login', "adminlogin")->middleware("guest");


            Route::post("/login" , "adminAuth")->middleware("guest");


            Route::get("/logout/{gaurd}" ,  "logout");


        });



});



