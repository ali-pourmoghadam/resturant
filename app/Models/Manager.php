<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Manager  extends Authenticatable
{
    use HasFactory ;

    protected $guard = 'manager';


    protected $with =
     [

         'resturants' ,

         'menus'
     ];



    protected $fillable = 
    [
        "email" , 

        "password" ,

        "name" , 

        "lastname" , 

        "adress" ,

        "national_id",

        "phoneNumber" ,

        "image" 
    ];
    

    protected function password() : Attribute
    {
        return Attribute::make( set : fn($value) => bcrypt($value));
    }



    public function resturants()
    {
        return $this->hasMany(Resturant::class);
    }
    

    public function menus()
    {
        return $this->hasManyThrough(Menu::class , Resturant::class)->with("product");
    }

}




