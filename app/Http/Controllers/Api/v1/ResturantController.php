<?php

namespace App\Http\Controllers\Api\v1;

use App\Actions\User\ResturantFoodAction;
use App\Actions\User\ResturantNearAction;
use App\Helpers\AppHelpers;
use App\Http\Controllers\Controller;
use App\Http\Requests\ResturantNearRequest;
use App\Http\Resources\ResturantFood;
use App\Http\Resources\ResturantFoodResource;
use App\Http\Resources\ResturantResource;
use App\Models\Address;
use App\Models\Adress;
use App\Models\Resturant;
use Illuminate\Http\Request;

class ResturantController extends Controller
{



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return  ResturantResource::collection(Resturant::all());
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($resturant)
    {
        return  new ResturantResource($resturant);
    }



    public function food($resturant)
    {       
       return  new ResturantFoodResource($resturant);

    }

    public function nearBy(ResturantNearRequest $request, AppHelpers $helper ,ResturantNearAction $resturantsAction)
    {
        
        $attribute  = $request->validated();

        $resturants =  $resturantsAction->execute( 0.5);

        return $helper->jsonResponse(ResturantResource::collection($resturants));
    }



}
