<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
    public $incrementing = false;
    protected $primaryKey = 'id';
    protected $fillable = [ 'id', 'content', 'restaurant_id', 'user_id' ];

    // return all comments within this post
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    // return the restaurant this post belongs to
    public function restaurant()
    {
        return $this->belongsTo('App\Restaurant');
    }

    // return the user this post belongs to
    public function user()
    {
        // return $this->belongsTo('App\User');
        return $this->belongsTo('App\User');
    }
}
