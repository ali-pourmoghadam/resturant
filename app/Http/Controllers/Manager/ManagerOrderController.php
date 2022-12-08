<?php


namespace App\Http\Controllers\Manager;

use App\Events\OrderUpdateEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\OrderStatusRequest;
use App\Models\OrderProduct;
use App\Services\Manager\ManagerOrderService;
use Illuminate\Http\Request;

class ManagerOrderController extends Controller
{
    

    public function orders(ManagerOrderService $orderService)
    {

        $orders = $orderService->orderActives();

        $status = $orderService->orderStatus();

        return view("manager.order" , compact("orders" , "status"));
    }


    public function orderStatusUpdate(OrderStatusRequest $request , $id)
    {

        
        $attribute = $request->validated();

        $order = OrderProduct::find($id);

        $order->update(["status" => $attribute["status"]]);

        event(new OrderUpdateEvent($order));

        return redirect("/manager/order");
        
    }
}
