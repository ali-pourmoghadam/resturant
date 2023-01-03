<?php

namespace App\Services\User;

use App\Models\Order;
use App\Models\Transaction;
use App\Services\Contracts\PaymentContract;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;

class BankPaymentService implements PaymentContract {





    public function pay($orderId , $price)
    {

        $transactionId  = Uuid::uuid4();

        return  redirect("/api/v1/user/cart/order/$orderId/$transactionId");

    }



    public function setTranaction($orderId , $transactionId)
    {

       $transaction = DB::transaction(fn() =>

                      Transaction::create([ "order_id" => $orderId , 
                                            "transaction_id" =>   $transactionId ,
                                            "status" => 1
                                    ]));


                                    
        return ($transaction->id) ? true : false;

    }

  // send trancaction id to bank api and get details 

  
    public function getTransaction(Transaction $transaction)
    {
        
        return true;
    }
}