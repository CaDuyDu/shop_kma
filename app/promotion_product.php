<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class promotion_product extends Model
{
    protected $fillable = [
    	'promotion_id','product_id',
    ];
}
