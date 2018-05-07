<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    // public $incrementing = false;
    // public $timestamps = false;
    protected $primaryKey = 'id';
    protected $fillable = [ 'name' ];

    // return all restaurants in this category
    public function restaurants()
    {
        return $this->hasMany('App\Restaurant');
    }
}
