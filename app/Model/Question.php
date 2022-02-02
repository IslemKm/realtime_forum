<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    //


    /**
     * Get all of the replies for the Question
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */

    public function replies()
    {
        return $this->hasMany('App\Model\Reply');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function categories()
    {
        return $this->belongsTo('App\Model\Category');
    }

    
}
