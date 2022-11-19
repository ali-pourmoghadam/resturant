<?php

namespace App\Http\Controllers\Manager;

use App\Helpers\AppHelpers;
use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     
        $menus = Auth::guard("manager")->user()->menus;

        return view('manager.menu' , compact('menus'));

    }

  

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request , AppHelpers $helper)
    {

        $binaryDays = $this->binaryDays($request , $helper);

        // untill now  the manager allowd just have one resturant but this will be change later , so chose first index resturant

        $resturantId =  Auth::guard('manager')->user()->resturants[0]->id;

        Menu::create([

            "name" => $request->input("name")  ,
            
            "resturant_id" =>   $resturantId,

            "for_days"  => $binaryDays
        ]);

        return redirect("/manager/menu");
    }

  

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id  ,  AppHelpers $helper)
    {
        
       $binaryDays = $this->binaryDays($request , $helper);

       $attributes = $request->validate([

            "name" => "required" ,

            "status" => "required" 

        ]);
        
        $attributes['for_days'] =   $binaryDays;

        Menu::where("id" , $id)->update($attributes);

        return redirect("/manager/menu");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        Menu::where("id" , $id)->delete();

        return redirect("/manager/menu");

    }
    


    public function binaryDays($request , $helper)
    {
        $days  = $request->except('_token' , "name" , "status" , "_method");
        
        return $helper->encodeBinaryDays($days);
    }

}
