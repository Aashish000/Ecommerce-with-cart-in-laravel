<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\User;
use App\Order;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
        $products = Product::all();
        $category = Category::all();

        $user = User::all();
        return view('admin.index')->with('products',$products)->with('category',$category)->with('user',$user);        
    }

    


    public function orderlist()
    {
        $products = Product::all();
        $order = Order::all();
        $category = Category::all();

        $user = User::all();
        return view('admin.order')->with('products', $products)->with('order', $order)->with('category', $category)->with('user', $user);
    }
}
