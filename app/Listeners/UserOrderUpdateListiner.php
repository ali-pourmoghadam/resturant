<?php

namespace App\Listeners;

use App\Events\OrderUpdateEvent;
use App\Mail\OrderUpdateMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class UserOrderUpdateListiner
{
    

    /**
     * Handle the event.
     *
     * @param  \App\Events\OrderUpdateEvent  $event
     * @return void
     */
    public function handle(OrderUpdateEvent $event)
    {
         $user = $event->orderProduct->order->user;

         Mail::to($user)->send(new OrderUpdateMail($event->orderProduct));
    }
}
