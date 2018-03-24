<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    protected $fillable = [
    	'code','name','mobile','address','user_id','total_price',
    ];
    public function order_detail()
    {
        return $this->hasMany('App\order_detail');
    }
}
