<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Address extends Model
{
   
    use HasFactory;

    protected $fillable = [

        'title',
        
        "user_id" ,
        
        'address' , 

        'latitude' ,
        
        'longitude' ,

        "is_active"

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
 

}
