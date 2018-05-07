<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'countries';
    protected $primaryKey = 'id';
    protected $fillable = [ 'name' ];

    // return all user_ids within this country
    public function users()
    {
        return $this->hasMany('App\User');
    }

    // return all restaurant_ids within this country
    public function restaurants()
    {
        return $this->hasMany('App\Restaurant');
    }

    // access all posts by users in a given country
    public function posts()
    {
        return $this->hasManyThrough('App\Post', 'App\User');
    }
}
