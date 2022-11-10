<?php

namespace App\Http\Controllers;

use App\Http\Requests\ManagerSettingRequest;
use App\Models\Manager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ManagerController extends Controller
{
    public function dashboard()
    {
        return view("manager.dashboard");
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
