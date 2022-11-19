<?php

namespace App\Listeners;

use App\Events\FoodPartyEvent;
use App\Models\Resturant;
use App\Notifications\FoodPartyNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class ResturantPartyNotification
{

    /**
     * Handle the event.
     *
     * @param  \App\Events\FoodPartyEvent  $event
     * @return void
     */
    public function handle(FoodPartyEvent $event)
    {

        $resturants = Resturant::active()->get();

        Notification::send($resturants , new FoodPartyNotification($event->party));
    }
}
