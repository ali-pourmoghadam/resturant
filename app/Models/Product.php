<?php

namespace App\Models;

use App\Models\Scopes\ActiveScop;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
    
}
