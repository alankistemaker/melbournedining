<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users'; // define the table name
    protected $fillable = [
        'name',
        'email',
        'password',
        'country_id'
    ];

    protected $hidden = [ 'password' ];

    // return the country_id associated with this user
    public function country()
    {
        return $this->belongsTo('App\Country');
    }
    
    // return all posts from this user
    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    // return all comments from this user
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    // return the roles that belong to the user
    public function roles()
    {
        return $this->belongsToMany('App\Role', 'role_user')->as('role')->withTimestamps();
    }
}
