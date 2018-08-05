<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
    	'name', 'slug', 'description', 'image', 'price', 'quantity', 'category_id', 'genre_id'
    ];

    public function genre()
    {
    	return $this->belongsTo('App\Genre');
    }

    public function category()
    {
    	return $this->belongsTo('App\Category');
    }

    public function sales()
    {
    	return $this->belongsToMany('App\Sale');
    }
}
