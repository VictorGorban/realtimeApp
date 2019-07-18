<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $fillable = [
        'name',
//        'slug',
    ];

    function questions()
    {
        /*one to many*/
        return $this->hasMany(Question::class);
    }
}
