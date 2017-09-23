<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\User;
use App\Order;
use Auth;
use Session;
use Redirect;
use DB;

class OrderController extends Controller
{
	 public function __construct()
    {
        $this->middleware('auth:web');
    }


    public function index($id)
    {
       	$product = Product::find($id);

        $category = Category::all();

        $user = Auth::user();
         return view('customer.order')->with('product',$product)->with('category',$category)->with('user',$user);
    }

    public function place(Request $request)
    {
    	$order = new Order;
    	$order->product_id = $request->product_id;
    	$order->user_id = $request->user_id;
    	$order->name = $request->name;
    	$order->lastname = $request->lastname;
    	$order->phone = $request->phone;
    	$order->address = $request->address;
    	$order->city = $request->city;
    	$order->country = $request->country;
    	$order->save();
    	Session::flash('success', "order placed sucessfully");
       return redirect::route('customer.dashboard');
    }

    public function lists()
    {
    	$category =  Category::all();
    	$id = Auth::user()->id;
    	$orders = DB::table('orders')->where('user_id', $id)->get();
    	
    	return view('customer.orderlist')->with('category',$category)->with('orders',$orders);
    }
}
