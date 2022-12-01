<?php

namespace App\Services\Contracts;

use App\Models\Order;
use App\Models\Transaction;

interface PaymentContract {

    public function pay($orderId  , $price);
    
    public function setTranaction(Order $order , $tranactionId );

    public function getTransaction(Transaction $tranaction);

}