<?php

namespace App\Actions;

use App\Helpers\AppHelpers;
use App\Models\FoodParty;
use Carbon\Carbon;

class FoodPartyInterference {

    public function execute(string $startTime ,string $endTime)
    {
    
      $startTime = Carbon::parse($startTime);

      $endTime = Carbon::parse($endTime);


      if($startTime < now() || $endTime < now())
      { 
        return  $this->response("تاریخ شروع یا پایان نمیتواند مربوط به گذشته است");
      }


      if($startTime >  $endTime )
      { 
        return  $this->response("تاریخ اغاز نمیتواند از تاریخ پایان بزرگتر باشد");
      }  

      
      $beginInterference = FoodParty::Interference($startTime)->get();

      $endInterference =  FoodParty::Interference($endTime)->get();


       if(!$beginInterference->isEmpty() || !$endInterference->isEmpty())
        {
            return  $this->response("تداخل زمانی رخ داده است");
        }
       
        return true;

    }


    public function response(string $error)
    {
        return response()->json(["errors" =>[ "logical" => $error ]] , 400);
    }

    
}