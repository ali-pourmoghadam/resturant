<?php

namespace App\Http\Controllers;

use App\Http\Resources\CityResource;
use App\Models\City;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{


    public function index()
    {
        return Cache::rememberForever('user', fn()=> User::all());
    }


    public function cities()
    {

         return Cache::rememberForever('city', fn()=>  CityResource::collection(City::all()));

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
