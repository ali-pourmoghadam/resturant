<?php

namespace App\Http\Controllers;

use App\Http\Resources\AddressResource;
use App\Http\Resources\CityResource;
use App\Http\Resources\FoodCategoryResource;
use App\Http\Resources\ResturantResource;
use App\Models\City;
use App\Models\FoodCategory;
use App\Models\Resturant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class ApiController extends Controller
{
    

    public function users()
    {
        return Cache::rememberForever('user', fn()=> User::all());
    }


    public function cities()
    {

         return Cache::rememberForever('city', fn()=>  CityResource::collection(City::all()));

    }

    public function adresses()
    {
        return Cache::rememberForever('address', fn()=>  AddressResource::collection(User::all())); 
    }

    public function foodCategory()
    {
        $categories = FoodCategory::with("product")->get() ;

        return FoodCategoryResource::collection($categories);
    }

    public function resturants()
    {
        return  ResturantResource::collection(Resturant::all());

    }

    public function updateGeoLocation(Request $request , $id)
    {

        $requester = Auth::guard("api")->user();


        if($requester->id != $id)
        {

            return response()->json([

                "msg" => "شما مجاز به انجام این عملیات نیستید" 

            ] , 401);

        }

        $attributes = $request->validate([

            "address" => "required|string" ,

            "latitude" => "required" ,

            "longtitude" => "required" 

        ]) ;

        
        User::find($id)->update( $attributes);


        return response()->json([
            "msg" => "اطلاعات با موفقیت اپدیت شد" 
        ]);
        
    }



}
