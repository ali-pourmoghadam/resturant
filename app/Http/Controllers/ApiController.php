<?php

namespace App\Http\Controllers;

use App\Helpers\AppHelpers;
use App\Http\Resources\AddressResource;
use App\Http\Resources\CityResource;
use App\Http\Resources\FoodCategoryResource;
use App\Http\Resources\ResturantResource;
use App\Models\Adress;
use App\Models\City;
use App\Models\FoodCategory;
use App\Models\Menu;
use App\Models\Resturant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class ApiController extends Controller
{
    

    // public function users()
    // {
    //     return Cache::rememberForever('user', fn()=> User::all());
    // }


    // public function cities()
    // {

    //      return Cache::rememberForever('city', fn()=>  CityResource::collection(City::all()));

    // }

    // public function getAddress($id)
    // {

    //     if(!$this->requesterAuth($id)){

    //         return response()->json([
    
    //             "msg" => "you're not authroize for this operation!" 
    
    //         ] , 401);
    
    //        }
           

    //     return Cache::rememberForever('address', fn()=>  AddressResource::collection( Adress::where("user_id" , $id)->get())); 
    // }

    // public function insertAddress(Request $request , $id)
    // {


    //    if(!$this->requesterAuth($id)){

    //     return response()->json([

    //         "msg" => "شما مجاز به انجام این عملیات نیستید" 

    //     ] , 401);

    //    }


 
        // $attributes = $request->validate([

        //     "title" => "required" ,

        //     "address" => "required|string" ,

        //     "latitude" => "required" ,

        //     "longitude" => "required" 

        // ]) ;
        
    //     $attributes["user_id"] = $id;


    //     Adress::create($attributes);

    //     return response()->json([
    //         "msg" => "اطلاعات ثبت شد" 
    //     ]);
        
     
    // }

    // public function updateAddress(Request $request , $id)
    // {


    //     if(!$this->requesterAuth($id)){

    //         return response()->json([
    
    //             "msg" => "شما مجاز به انجام این عملیات نیستید" 
    
    //         ] , 401);
    
    //        }

       

    //     $attributes = $request->validate([
            
    //         "title" =>  "required|string" ,

    //         "address" => "required|string" ,

    //         "latitude" => "required" ,

    //         "longitude" => "required" 

    //     ]) ;

    //     $attributes["user_id"] = $id ;

        
    //     Adress::where("user_id" , $id)->update( $attributes);


    //     return response()->json([
    //         "msg" => "اطلاعات با موفقیت اپدیت شد" 
    //     ]);
        
    // }

    // public function foodCategory()
    // {
    //     $categories = FoodCategory::with("product")->get() ;

    //     return FoodCategoryResource::collection($categories);
    // }

    // public function resturants()
    // {
       
    //     return  ResturantResource::collection(Resturant::all());


    // }


   




}
