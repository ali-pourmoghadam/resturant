<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddressUpsertRequest;
use App\Http\Resources\AddressResource;
use App\Models\Address;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;


class AddressController extends Controller
{
   /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddressUpsertRequest $request , $id)
    {
  
        $attributes = $request->all() ;

        $attributes["user_id"] = $id ;

        Address::create($attributes);

        return response()->json([

            "msg" => "ifnormation registered successfully" 

        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        
        $this->authorize("view" ,[ Address::class , $user->id]);

        return AddressResource::collection($user->address); 
    }

  

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AddressUpsertRequest $request, $id)
    {

        $attributes = $request->all() ;

        $attributes["user_id"] = $id ;
        
        Address::find($id)->update( $attributes);

        return response()->json([

            "msg" => "ifnormation updated successfully" 

        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
