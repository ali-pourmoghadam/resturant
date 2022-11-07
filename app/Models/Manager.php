<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Manager  extends Authenticatable
{
    use HasFactory;

    protected $guard = 'manager';


    protected $fillable = 
    [
        "email" , 
        "password"
    ];
    
    

}




