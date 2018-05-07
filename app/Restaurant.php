<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    protected $table = 'restaurants';  // Define the table name
        // public $incrementing = false;
        public $timestamps = false;
        protected $primaryKey = "id";
        protected $fillable = [
            'name', 
            'phone', 
            'address1', 
            'address2', 
            'suburb', 
            'state', 
            'numberofseats',
            'country_id', 
            'category_id'
        ];

    public function posts()
    {
        // return all posts belonging to this restaurant
        return $this->hasMany('App\Post');
    }
    
    // return the restaurant's country_id
    public function country()
    {
        return $this->belongsTo('App\Country');
    }

    // return the restaurant's category_id
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
