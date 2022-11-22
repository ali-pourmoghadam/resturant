<?php

namespace App\Services\Manager;

use App\Services\Contracts\NotificationsContract;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;


class ManagerNotificationService implements NotificationsContract{


  private array $notifications = [];

  
   public function registerNotification()
   {

      $this->notifications = [

         "foodParty" => $this->foodPartyNotifs() 

      ];

   }


   public function unreadNotifications()
   {


      return Auth::guard("manager")
                   ->user()
                   ->resturants[0]
                   ->unreadNotifications;
   }



   
   public function getNotifications()
   {
         return $this->notifications;
   }

    
   
   public function count()
   {
       return $this->unreadNotifications()->count();
   }

    
    public function markRead($id)
    {
      
      $this->unreadNotifications()->filter(fn($notif)=> $notif->id == $id)
                                  ->markAsRead();                           

    }


   public function foodPartyNotifs()
   {
       $result = [];

       $notifications = $this->unreadNotifications();

       foreach ($notifications as $notif)
       {
             $result[] = [

               "id" =>  $notif->data['id'] ,

               "begin" =>  Carbon::parse($notif->data['begin']) ,

               "end" =>    Carbon::parse($notif->data['end']) 
             ];
       }       
       
       return $result;
                  
   }


  
}