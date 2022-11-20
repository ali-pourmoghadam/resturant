<?php


namespace App\Actions\Manager;

use App\Services\Manager\ManagerNotificationService;

class ManagerNotifcationAction {

    public function execute( )
    {
    
        return [

            "foodParty" => ManagerNotificationService::foodPartyNotifs() 

        ];

       
    }


}