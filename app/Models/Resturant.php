<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resturant extends Model
{
    use HasFactory;


    protected $fillable = 
    [
        "manager_id" , 

        "city_id" ,

        "rsturant_category"
    ];

}
