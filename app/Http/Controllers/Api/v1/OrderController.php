<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Services\User\OrderService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }


    public function orderPayment()
    {
        $this->authorize("userAction" , Order::class);

        $this->orderService->orderCalculation();

    }

}
