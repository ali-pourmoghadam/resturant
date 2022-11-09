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


    protected $with =
     [

         'resturants' ,

         'menus'
     ];



    protected $fillable = 
    [
        "email" , 
        "password"
    ];
    


    public function resturants()
    {
        return $this->hasMany(Resturant::class);
    }
    

    public function menus()
    {
        return $this->hasManyThrough(Menu::class , Resturant::class)->with("product");
    }

}




