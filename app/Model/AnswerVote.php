<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class AnswerVote extends Model
{
    protected $fillable = [
        'user_id',
        'question_id',
        'is_vote_up'
    ];

    function user(){
        return $this->belongsTo(User::class);
    }

    function answer(){
        return $this->belongsTo(Answer::class);
    }
}
