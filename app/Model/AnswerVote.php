<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class AnswerVote extends Model
{
    function user(){
        return $this->belongsTo(User::class);
    }

    function answer(){
        return $this->belongsTo(Answer::class);
    }
}
