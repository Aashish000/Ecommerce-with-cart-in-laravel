<?php

namespace App;
use \Eloquent;


class Order extends eloquent
{
	protected $fillable = [
		'user_id',
    'product_id',
    'lastname',
    'phone',
    'address',
    'city',
    'country',
	]; 



    public function user()
    {
           return $this->belongsTo('App\User', 'user_id', 'id');
    }

   
    public function product()
    {
           return $this->belongsTo('App\Product', 'product_id', 'id');
    }
}
