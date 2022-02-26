<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    //

    protected $guarded = [];
    public function likes()
    {
        return $this->hasMany('App\Model\Like');
    }

    public function question()
    {
        return $this->belongsTo('App\Model\Question');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
