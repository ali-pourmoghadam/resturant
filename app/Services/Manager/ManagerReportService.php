<?php

namespace App\Services\Manager;

use App\Models\OrderProduct;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;


class ManagerReportService{

    public CONST ORDERBY = [ "week" => 0 , "month" =>1]; 



    public function __construct()
    {
        $this->resturant = Auth::guard("manager")->user()->resturants[0];
    }



    public function reportCompletedOrders()
    {
        return OrderProduct::where("resturant_id" , $this->resturant->id)
                            ->where("status"  , 3)
                            ->get();
    }


    
    public function reportFilterOrder($orderNumber)
    {

        $orderBy = ($orderNumber == self::ORDERBY["week"]) ? "subWeek" : "subMonth";
           
        return OrderProduct::where("resturant_id" , $this->resturant->id)
                            ->where("status"  , 3)
                            ->whereBetween('created_at', [Carbon::now()->$orderBy()->format("Y-m-d H:i:s"), Carbon::now()])
                            ->get();
    }



}