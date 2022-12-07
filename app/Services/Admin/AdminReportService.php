<?php

namespace App\Services\Admin;

use App\Models\City;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Resturant;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AdminReportService {

    public CONST ORDERBY = [ "week" => 0 , "month" =>1]; 


    public function countUsers()
    {
        return User::all()->count();
        
    }

    public function countCities()
    {
        return City::all()->count();
        
    }

    public function countResturants()
    {
        return Resturant::all()->count();
    }


    public function countOrders()
    {
        return $this->orders()->count();
    }


    public function orders()
    {
        return Order::all();
    }


    public function bestSellers($limit)
    {
        return OrderProduct::select("product_id" ,  DB::raw("sum(quantity) as total"))
                            ->groupBy("product_id")
                            ->orderBy("total" , "desc")
                            ->limit($limit)
                            ->get();
        
    }


    public function incomeByMonth()
    {
        $result = OrderProduct::select( DB::raw("sum(price) as total"),  DB::raw("Month(created_at) as month"))
                            ->groupBy("month")
                            ->orderBy("month" , "asc")
                            ->get();

        $result->each(fn($item) => $item->month = Carbon::create()->month($item->month)->format('M'));
 
        return $result;

    }


        
    public function orderFilter($orderNumber)
    {

        $orderBy = ($orderNumber == self::ORDERBY["week"]) ? "subWeek" : "subMonth";
           
        return  Order::whereBetween('created_at', [Carbon::now()->$orderBy()->format("Y-m-d H:i:s"), Carbon::now()])->get();

    }


   
  

}