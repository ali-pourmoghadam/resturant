<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ManagerComment extends Model
{
    use HasFactory , SoftDeletes;


    protected $fillable = 
    [
        "comment_id" , 
        
        "message"
    ];


    public function comment()
    {
        return $this->belongsTo(Comment::class);
    }

}

