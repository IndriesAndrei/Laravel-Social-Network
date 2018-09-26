<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    // one like belongs to a post and to a user
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function post()
    {
        return $this->belongsTo('App\Post');
    }
}
