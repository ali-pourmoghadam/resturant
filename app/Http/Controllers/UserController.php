<?php

namespace App\Http\Controllers;

use App\Http\Resources\CityResource;
use App\Models\City;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

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

}
