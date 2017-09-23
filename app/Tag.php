<?php 

namespace App;
use \Eloquent;

class Tag extends eloquent
{

	protected $fillable = [
		'name',
	];
	public function products()
    {
    	return $this->belongsToMany('App\Product');
    }
}
