<?php

namespace App\Services\Manager;

use App\Models\OrderProduct;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;

class ManagerOrderService{

    public function __construct()
    {
        $this->resturant = Auth::guard("manager")->user()->resturants[0];
    }



    public function orderActives()
    {
        return OrderProduct::where("resturant_id" , $this->resturant->id)
                            ->where("status"  , 0)
                            ->get();
    }

    public function orderStatus()
    {
        return Config::get("const.orderStatus");
    }


}