<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product_gallery extends Model
{
    protected $fillable = [
    	'product_id','link','is_thumbnail',
    ];
}
