<?php

namespace App\Http\Controllers\Api\v1;

use App\Actions\User\ProductExistsAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\CartUpsertRequest;
use Doctrine\Common\Cache\Cache;
use Illuminate\Http\Request;

class CartController extends Controller
{
    

    public function addToCart(CartUpsertRequest $request , ProductExistsAction $productExists)
    {

        $attributes = $request->validated();
        
        abort_if(! $productExists->execute($attributes) , 404);
        
    
    }
}
