<?php
namespace App;
use \Eloquent;

Class Comment extends eloquent
{

	public function user()
    {
           return $this->belongsTo('App\User', 'user_id', 'id');
    }

	public function product()
	{
		return $this->belongsTo('App\Product');
	}

}

