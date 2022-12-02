<?php

namespace App\Services\Manager;

use App\Models\OrderProduct;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;


class ManagerReportService{

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



}