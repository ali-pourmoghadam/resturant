<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodParty extends Model
{
    use HasFactory;


    protected $fillable = [
        
        "admin_id" ,

        "begin_at" ,

        "end_at" , 
    ];
    

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }


    protected function beginAt() : Attribute
    {
        return Attribute::make( set : fn($value)=> Carbon::parse($value));
    }


    protected function endAt() : Attribute
    {
        return Attribute::make( set : fn($value)=> Carbon::parse($value));
    }


    public function scopeInterference($query ,string $time)
    {
        return $query->where("begin_at" , "<=" , Carbon::parse($time))
                     ->Where("end_at" , ">=" ,  Carbon::parse($time))
                     ->where("is_active" , true);
    }

}
