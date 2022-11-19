<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Http\Requests\ManagerSettingRequest;
use App\Models\Manager;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ManagerController extends Controller
{
    public function dashboard()
    {
        $notifications = Auth::guard("manager")->user()->resturants[0]->unreadNotifications;
        
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
