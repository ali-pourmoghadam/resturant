<?php

namespace App\Actions\Manager;

use App\Models\Resturant;


class ResturantByOrderAction {

    public function execute($event)
    {
            $resturants = [];

            $event->order->product->each(function($prdouct) use(&$resturants){

            $resturants[] =  $prdouct->pivot->resturant_id;
            });

            return Resturant::whereIn("id" , $resturants)->get();
    }
}
