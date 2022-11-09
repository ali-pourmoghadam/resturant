<?php

namespace App\Models;

use App\Models\Scopes\ActiveScop;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodCategory extends Model
{
    use HasFactory;

    protected $fillable = [

        'name',
        
        'status'
    ];


    public function product()
    {
        return $this->hasMany(Product::class);
    }


}
