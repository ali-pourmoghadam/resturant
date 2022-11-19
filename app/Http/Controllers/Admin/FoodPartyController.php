<?php

namespace App\Http\Controllers\Admin;

use App\Actions\FoodPartyInterference;
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
    public function store(FoodPartyCreateRequest $request , FoodPartyInterference $dateChecker)
    {

        $res = $dateChecker->execute($request->input("beginDate") , $request->input("endDate"));

        if($res !== true) return $res;

        $party =  FoodParty::create ([ 

            "admin_id" => Auth::guard("admin")->id(),

            "begin_at" => $request->input("beginDate") ,

            "end_at" => $request->input("endDate") ,

        ]);

        event(new FoodPartyEvent($party));

        return response()->json(['success' => true]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        FoodParty::where("id", $id)->delete();
        
        return redirect("/admin/foodParty");
    }
}
