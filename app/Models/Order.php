<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;


    protected $fillable = 
    [
        "user_id" , 

        "is_done" 

    ];


    protected $with = [

        "product"
        
    ];

    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsToMany(Product::class);
    }

    public function transaction()
    {
        return $this->hasMany(Transaction::class);
    }
    
}
