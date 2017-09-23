<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\User;
use Auth;
use Redirect;

class CustomerController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
        $category = Category::all();
         return view('customer.index')->with('category',$category);   
     }

    public function addressbook()
    {
        $category = Category::all();
         return view('customer.address-book')->with('category',$category);   
    }




    public function orderlist()
    {
        $category = Category::all();
        $orders = Auth::user()->orders;
        $orders->transform(function($order, $key) {
        $order->cart = unserialize($order->cart);
        return $order;
        });
        return view('orderList', ['orders' => $orders])->with('category',$category);



       
    }

}
