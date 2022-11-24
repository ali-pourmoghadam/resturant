<?php

namespace App\Http\Controllers\Api\v1;

use App\Helpers\AppHelpers;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddressUpsertRequest;
use App\Http\Resources\AddressResource;
use App\Models\Address;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class AddressController extends Controller
{


    public function __construct(AppHelpers $helper)
    {
        $this->helper =  $helper;
    }



   /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddressUpsertRequest $request)
    {
        
        $attributes = array_merge($request->all() , ["user_id" => Auth::id()] );

        Address::create($attributes);

        return $this->helper->jsonResponse("ifnormation registered successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $this->authorize("accessAdress" ,[ Address::class , $user->id]);

        return AddressResource::collection($user->address); 
    }

  

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AddressUpsertRequest $request , $address)
    {
    
        $this->authorize("accessAdress" ,[ Address::class ,  $address->user_id]);

        $attributes = array_merge($request->all() , ["user_id" => Auth::id()] );

        $address->update($attributes);
        
        return $this->helper->jsonResponse("information updated successfully");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($address)
    {
        $this->authorize("accessAdress" ,[ Address::class ,  $address->user_id]);

        Address::destroy($address->id);

        return $this->helper->jsonResponse("information deleted successfully");

    }
}
