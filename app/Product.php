<?php
namespace App;
use \Eloquent;
use App\Category;
use App\Order;
class Product extends eloquent
{

 protected $primary_key = 'id';
	protected $fillable = [
		'name',
		'description',
		'price',
		'quantity',
	    'tags',
		'image'

	]; 


	protected $appends = ['url', 'image_url'];

	function getUrlAttribute( $url )
	{
		return route('product', $this->id);

	} 

	function getImageUrlAttribute()
	{
		return url('uploads/images/'. $this->image);
	}

	public function category()
    {
           return $this->belongsTo('App\Category', 'cat_id', 'id');
    }
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

     public function tags()
    {
    	return $this->belongsToMany('App\Tag');
    }
    public function comments()
    {
    	return $this->hasMany('App\Comment');
    }
}

