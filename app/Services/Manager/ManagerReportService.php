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
        return  $this->getOrders()->get();
    }

 
    
    
    public function reportFilterOrder($orderNumber)
    {

        $orderBy = ($orderNumber == self::ORDERBY["week"]) ? "subWeek" : "subMonth";
           
        return  $this->getOrders()
                     ->whereBetween('created_at', [Carbon::now()->$orderBy()->format("Y-m-d H:i:s"), Carbon::now()])
                     ->get();
    }



    public function reportIncomeOrder()
    {
        $income = 0;

        $this->getOrders()->each(function($order) use(&$income) {

            $income += $order->price;

        });

        return $income;

    }



    public function reportCoutnOrder()
    {
        return $this->getOrders()->count();
    }


    public function getOrders()
    {
        return OrderProduct::where("resturant_id" , $this->resturant->id)
                            ->where("status"  , 3);
    }

}