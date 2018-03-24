<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order_detail extends Model
{
    protected $fillable = [
    	'order_id','quantity','price','product_detail_id',
    ];
}
