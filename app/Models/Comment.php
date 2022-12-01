<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;

class Comment extends Model
{
    use HasFactory;


    protected   $fillable =[

        "order_id" ,

        "message" ,

        "score"
    ];

    protected $with = [

        "order"

    ];


    public function order()
    {
        return $this->belongsTo(Order::class);
    }


    protected  function status() : Attribute
    {
        return Attribute::make(
            get : fn($value) => Config::get("const.commentStatus")[$value]
        );
    } 

}
