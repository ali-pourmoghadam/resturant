<?php

namespace App\Models;

use App\Models\Scopes\ActiveScop;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    use HasFactory;

    protected $fillable = 
    [
        "name" , 

        "food_category_id" ,

        "price" ,

        "description" ,

        "img"
    ];

    protected $with = [

        "menu" , 

        "foodCategory" 

    ];


    public function foodCategory()
    {
        return $this->belongsTo(FoodCategory::class);
    }


    public function menu()
    {
        return $this->belongsToMany(Menu::class);
    }


    public function order()
    {
        return $this->belongsTo(Product::class);
    }


    public function resturant()
    {
        return DB::table("resturant")
                    ->whereIn("id",function($query){

                        $query->select("resturant_id")->from("menus")
                              ->join("menu_product" , "menu_product.menu_id" , "menus.id")
                              ->where("product_id", $this->id);

          });          
    }

    
}
