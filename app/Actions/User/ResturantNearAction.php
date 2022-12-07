<?php

namespace App\Actions\User;

use App\Models\Resturant;
use Illuminate\Support\Facades\DB;

class ResturantNearAction {


    public function execute($latitude , $longitude,  $distance = 1 )
    {

        return  Resturant::select(DB::raw("*, ( 3959 * acos( cos( radians('$latitude') ) * cos( radians( latitude ) ) * cos( radians( longtitude ) - radians('$longitude') ) + sin( radians('$latitude') ) * sin( radians( latitude ) ) ) ) AS distance"))
                            ->havingRaw("distance < $distance")
                            ->orderBy('distance')
                            ->get();    

    }
}
