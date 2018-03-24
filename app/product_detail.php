<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product_detail extends Model
{
    protected $fillable = [
    	'product_id','size','quantity','color',
    ];
}
