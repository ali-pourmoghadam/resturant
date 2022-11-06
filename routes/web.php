<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
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





Route::group([ 'prefix' => 'admin'], function(){



        route::group( ["controller" => AdminController::class] , function(){


                Route::get('/dashboard', "dashboard");
                
                
                Route::get('/resturant', "resturant");
        
        
                Route::get('/food',  "food");
        
            
    
        });
        

        route::group( ["controller" =>  AuthController::class ] , function(){


            Route::get('/login', "adminlogin")->middleware("guest");


            Route::post("/login" , "adminAuth");


            Route::get("/logout/{gaurd}" ,  "logout");


        });



});



