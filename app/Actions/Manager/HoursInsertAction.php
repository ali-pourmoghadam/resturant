<?php

namespace App\Actions\Manager;

use App\Models\Resturant;
use App\Models\WorkHours;

class HoursInsertAction{


    public function execute(Resturant $resturant ,array $hours)
    {
       $res = [];

       foreach($hours[0] as $key=>$item)
       {
        $res[$key] = $item."_".$hours[1][$key];
       }

       $res["resturant_id"] = $resturant->id;
       
        if($resturant->workHours)
        {
          return WorkHours::find($resturant->workHours->id)->update($res);
        }

       WorkHours::create($res);
    
    }

}