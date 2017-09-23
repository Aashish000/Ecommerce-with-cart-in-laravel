<?php
namespace App;
use \Eloquent;
use App\Product;
class Category extends eloquent
{

	protected $fillable = [
		'name',
	];

	public function products()
    {
        return $this->hasMany(Product::class);
    }
}

