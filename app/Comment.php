<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';
    public $incrementing = false;
    protected $primaryKey = 'id';
    protected $fillable = [ 'id', 'content', 'post_id', 'user_id' ];
    
    // return this comment's parent post
    public function post()
    {
        return $this->belongsTo('App\Post')->withDefault([
            'id' => '999',
            'content' => 'default post',
            'created_at' => NOW(),
            'updated_at' => NOW(),
            'restaurant_id' => '999',
            'user_id' => '999'
        ]);
    }

    // return the user this comment belongs to
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
