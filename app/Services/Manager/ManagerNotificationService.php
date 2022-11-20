<?php

namespace App\Services\Manager;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;


class ManagerNotificationService {


    public static function  foodPartyNotifs()
    {
        $result = [];

        $notifications = self::getUnreadAll();

        foreach ($notifications as $notif)
        {
              $result[] = [

                "begin" =>  Carbon::parse($notif->data['begin']) ,

                "end" =>    Carbon::parse($notif->data['end']) 
              ];
        }       
        
        return $result;
                   
    }



    public static function getUnreadAll()
    {
       return Auth::guard("manager")
                    ->user()
                    ->resturants[0]
                    ->unreadNotifications;
    }

}