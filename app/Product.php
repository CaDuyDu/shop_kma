<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name','code','brand_id','description','price','category_id',
    ];
    public function imagesDetail()
    {
        return $this->hasMany('App\product_gallery');
    }
    public function productsDetail()
    {
        return $this->hasMany('App\product_detail');
    }
}
