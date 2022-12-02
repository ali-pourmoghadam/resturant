<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class OrderProduct extends Model
{
    use HasFactory;

    protected $table  = "order_product";

    protected $with = [

        "resturant" , 

        "order"

    ];

    public function resturant()
    {
        return $this->belongsTo(resturant::class);
    }


    public function order()
    {
        return $this->belongsTo(Order::class);
    }


    public function product()
    {
        return $this->belongsTo(product::class);
    }

}
