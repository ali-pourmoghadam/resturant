<?php

namespace App\Actions\Manager;

use App\Models\Resturant;
use App\Models\WorkHours;

class HoursGetAction{


    public function execute(Resturant $resturant)
    {

        $res = [];

        $days =  collect($resturant->workHours)->except(["id" , "resturant_id" , "created_at" , "updated_at"])->toArray();

        foreach($days as $key=>$item){
            
            $res[$key] = explode("_" , $item);
        }

        return $res;
    }

}