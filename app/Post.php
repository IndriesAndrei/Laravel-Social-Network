<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // we set up the relation with the users
    // a post belongs to a user
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    // a post can have multiple likes
    public function likes()
    {
        return $this->hasMany('App\Like');
    }

}
