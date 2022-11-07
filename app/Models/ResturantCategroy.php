<?php

namespace App\Models;

use App\Models\Scopes\ActiveScop;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResturantCategroy extends Model
{
    use HasFactory;

    protected $fillable = [

        'name',
        
        'status'
    ];


     /**
     * The "booted" method of the model.
     *
     * @return void
     */

    protected static function booted()
    {
        static::addGlobalScope(new ActiveScop);
    }
}
