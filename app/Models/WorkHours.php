<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkHours extends Model
{
    use HasFactory;

    protected $gaurd = [];


    public function resturant()
    {
        return $this->belongsTo(Resturant::class);
    }
}
