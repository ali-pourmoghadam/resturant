<?php

namespace App\Services\User;

use App\Models\Order;
use App\Services\Contracts\PaymentContract;
use Illuminate\Support\Facades\Auth;

class OrderService {


    public function __construct(PaymentContract $paymentService ,CartService $cartService)
    {
        $this->paymentService = $paymentService;

        $this->cartService = $cartService;
    }



    public function orderCalculation(int $id)
    {
    
      abort_if(! $this->cartService->cartExist($id)  ,404);
          
      $cart = $this->cartService->readCacheAll();

      $price = 0;

      $cart->each(function($item) use(&$price) {
        
          foreach($item['foods'] as $food){
            
              $price += $food['price'];

              }

      });

      return $price;

    }


    public function orderRequest()
    {
      $id = Auth::id();
      
      $price = $this->orderCalculation($id);

      $order = Order::create(["user_id" =>  $id ]);

      return $this->paymentService->pay($order->id  , $price);
      
    }



    public function orderRegister($orderId , $transactionId)
    {
     
       return $this->paymentService->setTranaction($orderId , $transactionId);

    }


    public function orderReadAll()
    {
        
    }
    
    
}