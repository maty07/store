<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaleDetail extends Model
{
    protected $table = 'product_sale';

    protected $fillable = [
    	'product_id', 'sale_id', 'quantity'
    ];
}
