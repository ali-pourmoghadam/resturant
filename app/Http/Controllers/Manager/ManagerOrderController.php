<?php


namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Services\Manager\ManagerOrderService;
use Illuminate\Http\Request;

class ManagerOrderController extends Controller
{
    

    public function orders(ManagerOrderService $orderService)
    {

        $orders = $orderService->orderActives();

        return view("manager.order" , compact("orders"));
    }
}
