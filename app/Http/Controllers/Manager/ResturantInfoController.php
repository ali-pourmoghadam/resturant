<?php


namespace App\Http\Controllers\Manager;

use App\Actions\Manager\ActiveResturantAction;
use App\Actions\Manager\BinaryDaysAction;
use App\Actions\Manager\HoursCheckAction;
use App\Actions\Manager\HoursGetAction;
use App\Actions\Manager\HoursInsertAction;
use App\Helpers\AppHelpers;
use App\Http\Controllers\Controller;
use App\Http\Requests\ResturantInfoRequest;
use App\Models\Resturant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class ResturantInfoController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ActiveResturantAction $resturant, HoursGetAction $hoursAction)
    {
        $resturant = $resturant->execute();

        $workHours = $hoursAction->execute($resturant);


        return view("manager.info", compact("resturant" , "workHours"));
    }

  

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ResturantInfoRequest $request, $id ,AppHelpers $helper , HoursCheckAction $hourCheck , HoursInsertAction $hoursAction)
    {
        $attributes = $request->validated();

        $attributes['work_days'] = $helper->encodeBinaryDays($request->input("day"));


        if($request->file("thumbnail"))
        {
            unset($attributes["thumbnail"]);

            $attributes['image'] = $request->file("thumbnail")->store("resturant");
        }

        $hourCheck = $hourCheck->execute($request->input("begin") , $request->input("end"));
        
        if(!empty($hourCheck)) return back()->with( ["hours" => $hourCheck]);


        $resturant = Resturant::find($id);
        
        $resturant->update($attributes);

        $hoursAction->execute($resturant , [$attributes["begin"] , $attributes["end"]]);

        return back();

    }

 
}
