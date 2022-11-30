<?php

namespace App\Models;

use App\Helpers\AppHelpers;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

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
    

    public function allProducts()
    {
        return DB::table("products")
                    ->whereIn("id",function($query){

                        $query->select("product_id")->from("menus")
                              ->join("menu_product" , "menu_product.menu_id" , "menus.id")
                              ->where("resturant_id", $this->id);

          });          
    }


}
