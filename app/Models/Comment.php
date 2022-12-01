<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Config;

class Comment extends Model
{
    use HasFactory , SoftDeletes;  


    protected   $fillable =[

        "order_id" ,

        "message" ,

        "score" , 

        "status"
    ];

    protected $with = [

        "order" ,

        "managerComment"

    ];


    public function order()
    {
        return $this->belongsTo(Order::class);
    }


    public function managerComment()
    {
        return $this->hasMany(ManagerComment::class);
    }


    protected  function status() : Attribute
    {
        return Attribute::make(

            get : fn($value) => Config::get("const.commentStatus")[$value]

        );
    } 

}
