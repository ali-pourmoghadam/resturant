<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Admin\FoodPartyInterferenceAction;
use App\Events\FoodPartyEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\FoodPartyCreateRequest;
use App\Models\FoodParty;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FoodPartyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("admin.food_party" , [ "parties" => FoodParty::paginate()]);
    }

 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FoodPartyCreateRequest $request , FoodPartyInterferenceAction $dateChecker)
    {

        $res = $dateChecker->execute($request->input("beginDate") , $request->input("endDate"));

        if($res !== true) return $res;

        event(new FoodPartyEvent($request->except("_token")));

        return response()->json(['success' => true]);
    }


 

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        FoodParty::destroy($id);
        
        return redirect("/admin/foodParty");
    }
}
