<?php

namespace App\Listeners;

use App\Events\OrderEvent;
use App\Models\Resturant;
use App\Notifications\OrderNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class ResturantOrderNotification
{

    /**
     * Handle the event.
     *
     * @param  \App\Events\OrderEvent  $event
     * @return void
     */
    public function handle(OrderEvent $event)
    {
    
         $resturants = [];

         $event->order->product->each(function($prdouct) use(&$resturants){

            $resturants[] =  $prdouct->pivot->resturant_id;
         });

         $resturants = Resturant::whereIn("id" , $resturants)->get();

         Notification::send($resturants , new OrderNotification($event->order));

    }
}
