<?php

namespace App\Models;

use App\Models\Scopes\ActiveScop;
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

        "description"
    ];

    protected $with = [

        "menu"
        
    ];


    public function foodCategory()
    {
        return $this->belongsTo(FoodCategory::class);
    }


    public function menu()
    {
        return $this->belongsToMany(Menu::class);
    }
    
}
