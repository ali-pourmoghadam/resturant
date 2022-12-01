<?php

namespace App\Services\Manager;

use App\Services\Contracts\NotificationsContract;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;


class ManagerNotificationService implements NotificationsContract{


  private array $notifications = [];

  private const FOODPART_TYPE  = "App\Notifications\FoodPartyNotification";

  private const COMMENT_TYPE  = "App\Notifications\CommentNotification";

  private const ORDER_TYPE  = "App\Notifications\OrderNotification";
  



   public function registerNotification()
   {

      $this->notifications = [

         "foodParty" => $this->foodPartyNotifs()  ,

         "order" => $this->orderNotifs() ,

         "comment" => $this->commentsNotifs() ,


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

       $notifications = $this->filterNotifs(self::FOODPART_TYPE);


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


  public function commentsNotifs()
  {

       $notifications = $this->filterNotifs(self::COMMENT_TYPE);

       $data = [ "id" ,  "sender"];
       
       return $this->ReaderNotifs($notifications , $data);
   
  }


  public function orderNotifs()
  {

       $notifications = $this->filterNotifs(self::ORDER_TYPE);

       $data = ["id"];
       
       return $this->ReaderNotifs($notifications , $data);
   
  }



  private function filterNotifs($type){

   return  $this->unreadNotifications()->filter(function($notif)use($type){

         return $notif->type == $type;
   });

  }


  private function ReaderNotifs($notifications , $data = []){

    $result = [];

    $notifications->each(function($notif) use(&$result , $data){

         foreach($data as $item){

            $result[$notif->id][$item] =  $notif->data[$item] ;
         }
         
      });
    
    return $result;
  }

 
}