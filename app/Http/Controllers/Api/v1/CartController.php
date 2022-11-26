<?php

namespace App\Http\Controllers\Api\v1;

use App\Actions\User\CardCahceAction;
use App\Actions\User\ProductExistsAction;
use App\Helpers\AppHelpers;
use App\Http\Controllers\Controller;
use App\Http\Requests\CartUpsertRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class CartController extends Controller
{

    public function __construct(AppHelpers $helper)
    {
        $this->helper = $helper;
    }
    

    public function addToCart(CartUpsertRequest $request , ProductExistsAction $productExists ,CardCahceAction $cacheAction)
    {

        $attributes = $request->validated();
        
        abort_if(! $productExists->execute($attributes) , 404);
        
        $res = $cacheAction->execute($attributes['items']);

        return $this->helper->jsonResponse("items added successfully");
    
    }


    public function getCart()
    {
        echo Cache::get("card#".Auth::id());
    }
}
