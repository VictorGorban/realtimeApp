<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    //
    function question(){
        /*many-to-one, reversed one-to-many*/
        return $this->belongsTo(Question::class);
    }

    function user(){
        /*many-to-one, reversed one-to-many*/
        return $this->belongsTo(User::class);
    }

    function likes(){
        /*one-to-many*/
        return $this->hasMany(Like::class);
    }
}
