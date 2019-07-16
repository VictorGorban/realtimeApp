<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    function user(){
        return $this->belongsTo(User::class);
    }

    function reply(){
        return $this->belongsTo(Reply::class);
    }
}
