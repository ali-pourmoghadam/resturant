<?php

namespace App\Models;

use App\Models\Scopes\ActiveScop;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    
     /**
     * The "booted" method of the model.
     *
     * @return void
     */

    protected static function booted()
    {
        static::addGlobalScope(new ActiveScop);
    }


    public function rsturants()
    {
        return $this->hasMany(Resturant::class);
    }
}
