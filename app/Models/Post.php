<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    protected $fillable = [
        "title",
        "description",
        "images"
    ];

    protected $image =[
        "images" => "array"
    ];
}