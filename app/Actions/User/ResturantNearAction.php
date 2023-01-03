<?php

namespace App\Actions\User;

use App\Models\Resturant;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ResturantNearAction {


    public function execute($distance = 1 )
    {

        $addresses = Auth::guard("api")->user()->address;
        
        $activeAdress = $addresses->filter(fn($address)=> $address->is_active == true)->first();

        if(is_null($activeAdress)) return false;

        $latitude = $activeAdress->latitude;

        $longitude = $activeAdress->longitude;

        return  Resturant::select(DB::raw("*, ( 3959 * acos( cos( radians('$latitude') ) * cos( radians( latitude ) ) * cos( radians( longtitude ) - radians('$longitude') ) + sin( radians('$latitude') ) * sin( radians( latitude ) ) ) ) AS distance"))
                            ->havingRaw("distance < $distance")
                            ->orderBy('distance')
                            ->get();    

    }
}
