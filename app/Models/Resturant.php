<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resturant extends Model
{
    use HasFactory;

    
    protected $with = 
    [
        'menues' ,

        'cities'
    ];

    protected $fillable = 
    [
        "manager_id" , 

        "city_id" ,

        "rsturant_category"
    ];



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
    

}
