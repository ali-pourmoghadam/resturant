<?php

namespace App\Models;

use App\Helpers\AppHelpers;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = 
    [
        "name" , 

        "resturant_id" ,

        "status" ,

        "for_days"
    ];


    public function resturant()
    {
       return  $this->belongsTo(Resturant::class);
    }

    

    public function forDays() : Attribute
    {
        return Attribute::make(

            get : fn($value) => app(AppHelpers::class)->persianDays($value)
            
        );
    }


    public function product()
    {
        return $this->belongsToMany(Product::class);
    }


}
