<?php

namespace App\Listeners;

use App\Actions\Manager\ResturantByOrderAction;
use App\Events\CommentEvent;
use App\Events\UserComment;
use App\Models\Resturant;
use App\Notifications\CommentNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class ResturantCommentNotification
{
    
    public function __construct(ResturantByOrderAction $action)
    {
        $this->action = $action;
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\CommentEvent  $event
     * @return void
     */
    public function handle(UserComment $event)
    {
        $resturants = $this->action->execute($event->comment);
        
        Notification::send($resturants , new CommentNotification($event->comment));
    }
}
