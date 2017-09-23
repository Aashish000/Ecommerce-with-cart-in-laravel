<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/',['uses'=>'HomeController@index','as'=>'home']);
Route::get('/{id}/details',['uses'=>'HomeController@details','as'=>'details']);
Route::get('product/{id}/details',['uses'=>'HomeController@details','as'=>'details']);
Route::get('shop', ['uses'=>'HomeController@shop','as'=>'shop']);
// Route::get('cart', ['uses'=>'CartController@index','as'=>'cart']);
Route::get('checkout', ['uses'=>'CheckoutController@index','as'=>'checkout']);

Auth::routes();

Route::get('/customer/', 'CustomerController@index');
//for customers 
Route::get('/customer/dashboard',['uses'=>'CustomerController@index','as'=>'customer.dashboard']);
Route::get('/customer/addressbook',['uses'=>'AddressBookController@index', 'as'=>'customer.addressbook']);
Route::get('/customer/addressbook/edit',['uses'=>'AddressBookController@edit', 'as'=>'addressbook.edit']);
Route::post('/customer/addressbook/update', ['uses'=>'AddressBookController@update','as'=>'addressbook.update']);

//for comments 
Route::get('customer/comments',['uses'=>'CommentController@index', 'as'=>'comments.index', 'middleware'=>'auth']);
Route::post('/comments/{product_id}', ['uses'=>'CommentController@store', 'as'=>"comments.store"]);
Route::get('/comments/{id}/edit', ['uses'=>'CommentController@edit', 'as'=>'comments.edit', 'middleware'=>'auth']);
Route::put('/comments/{id}/update', ['uses'=>'CommentController@update', 'as'=>'comments.update', 'middleware'=>'auth']);
Route::get('/comments/{id}/edit', ['uses'=>'CommentController@edit', 'as'=>'comments.edit', 'middleware'=>'auth']);
Route::delete('comments/{id}', ['uses' => 'CommentController@destroy', 'as' => 'comments.destroy', 'middleware'=>'auth']);
	Route::get('comments/{id}/delete', ['uses' => 'CommentController@delete', 'as' => 'comments.delete', 'middleware'=>'auth']);


//for carts
Route::get('/add-to-cart/{id}',['uses'=>'HomeController@getAddToCart', 'as'=>'product.addToCart']);
Route::get('/add/{id}', ['uses'=>'HomeController@getAddByOne', 'as'=>'product.addByOne']);
Route::get('/reduce/{id}', ['uses'=>'HomeController@getReduceByOne', 'as'=>'product.reduceByOne']);

Route::get('cart', ['uses'=>'HomeController@getCart', 'as'=>'cart']);
//for checkout
Route::get('/checkout', ['uses'=>'HomeController@getCheckout', 'as'=>'checkout', 'middleware'=>'auth']);
Route::post('/checkout', ['uses'=>'HomeController@postCheckout', 'as'=>'postCheckout']);
//for orderhistory 
Route::get('/orderlist', ['uses'=>'CustomerController@orderlist', 'as'=>'orderList']);

//for orders
Route::get('/product/{id}/order', ['uses'=>'OrderController@index', 'as'=>'customer.order']);
Route::post('/product/{id}/confirmorder', ['uses'=>'OrderController@place', 'as'=>'order.place']);
Route::get('/customer/orderlist', ['uses'=>'OrderController@lists', 'as'=>'order.list']);


//for admins 
Route::group(['prefix'=>'admin'],function(){
Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
Route::get('/', 'AdminController@index')->name('admin.dashboard');
});


Route::group(['prefix'=>'admin/product'],function(){
	Route::get('/',['uses'=>'ProductController@index','as'=>'product']);
	Route::get('addproduct',['uses'=>'ProductController@create','as'=>'addproduct']);
	Route::post('saveproduct',['uses'=>'ProductController@store','as'=>'saveproduct']);
	Route::get('/{id}/editproduct',['uses'=>'ProductController@edit','as'=>'editproduct']);
	Route::post('/{id}/updateproduct', ['uses'=> 'ProductController@update', 'as' => 'updateproduct']);
	Route::get('/{id}/delete',['uses'=>'productController@destroy','as'=>'deleteproduct']);
});
//for categories
Route::group(['prefix'=>'admin/category'],function(){
	Route::get('/',['uses'=>'CategoryController@index','as'=>'category']);
	Route::get('/add',['uses'=>'CategoryController@create','as'=>'addcategory']);
	Route::post('/save',['uses'=>'CategoryController@store','as'=>'savecategory']);
	Route::get('/{id}/edit',['uses'=>'CategoryController@edit','as'=>'editcategory']);
	Route::post('/{id}/update',['uses'=>'CategoryController@update','as'=>'updatecategory']);
});
//for tags

// Route::resource('tags', 'TagController', ['except' => ['create']]);
Route::group(['prefix'=>'admin/tag'],function(){

	Route::get('/', ['uses'=>'TagController@index', 'as'=>'tags.index']);
	Route::post('/add', ['uses'=>'TagController@store', 'as'=>'tags.store']);
	Route::get('/{id}', ['uses'=>'TagController@show', 'as'=>'tags.show']);
	Route::get('/{id}/edit', ['uses'=>'TagController@edit', 'as'=>'tags.edit']);
	Route::PUT('/{id}/update', ['uses'=>'TagController@update', 'as'=>'tags.update']);
	Route::get('/{id}/delete', ['uses'=>'TagController@destroy', 'as'=>'tags.delete']);
});

Route::group(['prefix'=>'admin/user'],function(){
	Route::get('/',['uses'=>'UserController@index','as'=>'user']);
	Route::get('/add',['uses'=>'UserController@create','as'=>'adduser']);
	Route::post('/save',['uses'=>'UserController@store','as'=>'saveuser']);
	Route::get('/{id}/edit',['uses'=>'UserController@edit','as'=>'edituser']);
	Route::post('/{id}/update',['uses'=>'UserController@update','as'=>'updateuser']);
	Route::get('/{id}/delete',['uses'=>'UserController@destroy','as'=>'deleteuser']);
});
Route::group(['prefix'=>'admin/order'],function(){
	Route::get('/',['uses'=>'AdminController@orderlist','as'=>'admin.order']);
});
//admin comment
Route::get('/admin/comments/{product_id}', ['uses'=>'CommentController@view', 'as'=>'comments.view', 'middleware'=>'auth:admin']);


