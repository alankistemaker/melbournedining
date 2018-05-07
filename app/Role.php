<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';
    // public $incrementing = false;
    // public $timestamps = false;
    protected $primaryKey = 'id';
    protected $fillable = [ 'name', 'id' ];

    // return the users that belong to the role
    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
