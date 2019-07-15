<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\User;


class Question extends Model
{

    /*
     * in fact, we describe the model here. But these methods
     * can be used to retrieve linked records from DB.
     * */

    /**
     * @return user that we linked (many to one)
     */
    function user(){
        /*many to one or inversed one-to-one/one-to-many*/
        return  $this->belongsTo(User::class);
    }

    /**
     * @return many replies that linked us (one to many)
     */
    function replies(){
        /*one to many*/
        return $this->hasMany(Reply::class);

    }

    function category(){
        /*many to one*/
        return $this->belongsTo(Category::class);

    }


}
