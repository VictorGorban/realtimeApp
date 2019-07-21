<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Question extends Model
{

    /*
     * in fact, we describe the model here. But these methods
     * can be used to retrieve linked records from DB.
     * */

    protected $fillable = [
        'title',
//        'slug',
        'body',
        'category_id',
        'user_id',
    ];

    public function getRouteKeyName()
    {
        return 'id';
    }


    /**
     * @return BelongsTo
     */
    function user()
    {
        /*many to one or inversed one-to-one/one-to-many*/
        return $this->belongsTo(User::class);
    }

    /**
     * @return HasMany
     */
    function answers()
    {
        /*one to many*/
        return $this->hasMany(Answer::class);

    }

    function category()
    {
        /*many to one*/
        return $this->belongsTo(Category::class);

    }

    function votes(){
        /*one-to-many*/
        // баг был, т.к. first это не сортировка. Надо latest() или просто get().
        return $this->hasMany(QuestionVote::class);
    }


    function getPathAttribute()
    {
        // asset: app url + path
        return asset("/api/question/{$this->slug}");
    }

}
