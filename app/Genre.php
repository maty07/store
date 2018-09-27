<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $fillable = [
    	'name', 'slug', 'active'
    ];

    public function products()
    {
    	return $this->hasMany('App\Product');
    }
}
