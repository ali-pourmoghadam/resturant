<?php

namespace App\Listeners;

use App\Actions\Manager\ResturantByOrderAction;
use App\Events\OrderEvent;
use App\Models\Resturant;
use App\Notifications\OrderNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class ResturantOrderNotification
{

    public function __construct(ResturantByOrderAction $action)
    {
        $this->action = $action;
    }


    /**
     * Handle the event.
     *
     * @param  \App\Events\OrderEvent  $event
     * @return void
     */
    public function handle(OrderEvent $event)
    {
    
         $resturants = $this->action->execute($event);

         Notification::send($resturants , new OrderNotification($event->order));

    }
}
