<?php

namespace App\Policies;

use App\Models\Order;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class OrderPolicy
{
    use HandlesAuthorization;


    public function userAction()
    {
        return Auth::id() ?? false;
    }


    public function canComment( $orderClass, $order_id)
    {

        return (Order::findOrFail($order_id)->user_id == Auth::guard("api")->id()) ? true : false;
    }
}
