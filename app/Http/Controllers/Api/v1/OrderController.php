<?php

namespace App\Http\Controllers\Api\v1;

use App\Helpers\AppHelpers;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Services\User\OrderService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;

        $this->helper  = app(AppHelpers::class);
    }


    public function payment()
    {

        $this->authorize("userAction" , Order::class);

         return $this->orderService->orderRequest();

    }


    public function register($orderId , $transactionId)
    {
   
        $result = $this->orderService->orderRegister($orderId , $transactionId);

        $msg = ($result) ? "order Registerd successully" : "operation faild call with support";

        return $this->helper->jsonResponse($msg);

    }

    
}
