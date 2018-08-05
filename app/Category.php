<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
    	'name', 'slug'
    ];

    public function departament()
    {
    	return $this->belongsTo('App\Departament');
    }

    public function products()
    {
    	return $this->hasMany('App\Product');
    }
}
