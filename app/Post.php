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
        return $this->hasMany('App\Post', 'content');
    }

    // return the restaurant this post belongs to
    public function restaurant()
    {
        return $this->belongsTo('App\Restaurant')->withDefault([
            'id' => '1',
            'name' => 'default',
            'phone' => '0000000000',
            'address1' => 'default',
            'suburb' => 'default',
            'state' => 'dft',
            'numberofseats' => '0',
            'country_id' => '1',
            'category_id' => '1',
        ]);
    }

    // return the user this post belongs to
    public function user()
    {
        // return $this->belongsTo('App\User');
        return $this->belongsTo('App\User')->withDefault([
            'id' => '999',
            'name' => 'Guest',
            'email' => 'guest@test.com',
            'password' => 'password',
            'country_id' => '0000',
        ]);
    }
}
