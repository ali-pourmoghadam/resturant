<?php

namespace App\Http\Controllers\Manager;

use App\Actions\Manager\ManagerNotifcationAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\ManagerSettingRequest;
use App\Models\Manager;
use Illuminate\Support\Facades\Auth;



class ManagerController extends Controller
{
    public function dashboard(ManagerNotifcationAction $notifications)
    {
        
        $notifications = $notifications->execute();
        return view("manager.dashboard" , compact("notifications"));

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
