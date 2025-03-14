<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $guarded = [];


    public function carts()
    {
        return $this->belongsToMany(Cart::class);
    }
}
