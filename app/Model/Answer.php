<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
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

    function votes(){
        /*one-to-many*/

        return $this->hasMany(AnswerVote::class);
    }


    protected $fillable = [
        'body',
        'question_id',
        'user_id',

    ];

}
