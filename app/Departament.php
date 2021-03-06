<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departament extends Model
{
    
    protected $fillable = [
    	'name', 'slug', 'active'
    ];

    public function categories()
    {
    	return $this->hasMany('App\Category');
    }

}
