<?php

namespace App\Models;

use App\Helpers\AppHelpers;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Resturant extends Model
{
    use HasFactory , Notifiable;

    
    protected $with = 
    [
        'menues' ,

        'cities' ,

        "resturantCategory"
    ];

    protected $fillable = 
    [
        "manager_id" , 

        "city_id" ,

        "rsturant_category"
    ];


    public function workDays() : Attribute
    {
        return Attribute::make(

            get : fn($value) => app(AppHelpers::class)->persianDays($value)
            
        );

    }


    public function resturantCategory()
    {
        return  $this->belongsTo(ResturantCategroy::class , "resturant_category");
    }

    public function manager()
    {
       return $this->belongsTo(Manager::class);
    }


    public function menues()
    {
        return $this->hasMany(Menu::class);
    }


    public function cities()
    {
        return $this->belongsTo(City::class , "city_id");
    }


    public function scopeActive($query)
    {
        $query->where("is_active" , true);
    }
    

}
