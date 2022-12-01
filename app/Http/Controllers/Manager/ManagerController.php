<?php

namespace App\Http\Controllers\Manager;


use App\Http\Controllers\Controller;
use App\Http\Requests\ManagerSettingRequest;
use App\Models\Manager;
use App\Services\Contracts\NotificationsContract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class ManagerController extends Controller
{

    public function __construct(NotificationsContract $notification)
    {
        $this->Notification  =  $notification ;
    }
   


    public function dashboard()
    {
    
        $this->Notification->registerNotification();

        $countNotifs =   $this->Notification->count();
 
        $notifications = $this->Notification->getNotifications();

        return view("manager.dashboard" , compact("notifications" , "countNotifs"));

    }


    public function markNotifications($id)
    {
        $this->Notification->markRead($id);

        return response()->json(['success' => true]);
    }


    public function setting()
    {
        
        return view("manager.setting" ,  ["id" =>  Auth::guard("manager")->id()]);
    }
    

    public function storeSetting(ManagerSettingRequest $request ,$id)
    {

        $request->validated();

        $attributes =  $request->except("thumbnail" ,"_token" , "_method");

        $attributes['image'] = $request->file("thumbnail")->store("resturant");
        
        Manager::where("id" , $id)->update($attributes);
        
        return redirect("/manager/setting");

    }
}
