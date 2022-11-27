<?php

namespace App\Services\User;

use App\Services\Contracts\PaymentContract;

class OrderService {


    public function __construct(PaymentContract $paymentService ,CartService $cartService)
    {
        $this->paymentService = $paymentService;

        $this->cartService = $cartService;
    }


    public function orderCalculation()
    {
        
      $cart = $this->cartService->readCacheAll();

      dd($cart);

    }

    public function orderRegister()
    {
        
    }

    public function orderReadAll()
    {
        
    }
    
    
}