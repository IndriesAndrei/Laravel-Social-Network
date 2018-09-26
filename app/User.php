<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;

class User extends Model implements Authenticatable
{
    use \Illuminate\Auth\Authenticatable;

    // a user can have many posts
    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    // a user can like multiple posts
    public function likes()
    {
        return $this->hasMany('App\Like');
    }

}
