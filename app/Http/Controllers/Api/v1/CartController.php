<?php

namespace App\Http\Controllers\Api\v1;


use App\Actions\User\CardDeleteCacheAction;
use App\Actions\User\CardGetCacheAction;
use App\Actions\User\ProductExistsAction;
use App\Helpers\AppHelpers;
use App\Http\Controllers\Controller;
use App\Http\Requests\CartRequest;
use App\Services\User\CartService;


class CartController extends Controller
{
    public function __construct(AppHelpers $helper, CartService $cart)
    {
        $this->helper = $helper;

        $this->cartService = $cart;
    }
    

    public function addToCart(CartRequest $request )
    {

        $attributes = $request->validated();
        
        abort_if(! $this->cartService->productsExist($attributes) , 404);
    
        $this->cartService->writeCacheCart($attributes['items']);

        return $this->helper->jsonResponse("items added successfully");
    
    }


    public function getCart()
    {
        return $this->helper->jsonResponse($this->cartService->readCacheAll()); 
    }


    public function delCart(CartRequest $request )
    {

        $attributes = $request->validated();
        
        abort_if(! $this->cartService->productsExist($attributes) , 404);

        $msg =  $this->cartService->deleteCacheCart($attributes["items"]);

        return $this->helper->jsonResponse($msg);
    }
}
