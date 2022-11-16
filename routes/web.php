<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FoodCategoryController;
use App\Http\Controllers\FoodPartyController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\ManagerSettingController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ProductController;
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


    route::group( ["controller" =>  AuthController::class , "middleware" => "guest:manager"  ] , function(){


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

});




Route::group([ 'prefix' => 'admin'], function(){


           route::group( ["middleware" => "admin:manager"] , function(){


                Route::get('/dashboard', [AdminController::class ,  "dashboard"]);
                
                Route::resource('/resturant', ResturantCategoryController::class);
        
                Route::resource('/food',  FoodCategoryController::class);  
                
                Route::resource('/foodParty',  FoodPartyController::class);  

            });

        

        route::group( ["controller" =>  AuthController::class ] , function(){


            Route::get('/login', "adminlogin")->middleware("guest:admin,manager");


            Route::post("/login" , "adminAuth")->middleware("guest:admin,manager");


            Route::get("/logout/{gaurd}" ,  "logout");


        });

});



