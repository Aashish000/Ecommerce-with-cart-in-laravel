<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Redirect;
use App\Product;
use App\Category;
use App\Order;
use App\Tag;
use Session;
use App\Cart;
use DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
   
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products =  Product::orderBy('id', 'desc')->take(5)->get();
        dd($products);
        // $tag = Tag::where('name','=','featured')->first(); 
        $tag = Tag::where('name','=','featured')->first();


        $category = Category::all();
        return view('index')->with('products',$products)->with('category',$category)->with('tag',$tag);
    }

    public function shop()
    {
        $product = Product::all();
         $category = Category::all();
        return view('shop')->with('product',$product)->with('category',$category);
    }
     public function details($id)
    {
            $product = Product::find($id);
            $category = Category::all();
            return view('single-product')->with('product',$product)->with('category',$category);   

    }

    public function getAddToCart(Request $request, $id)
    {
        $category = Category::all();
        $product = Product::find($id);
        $oldcart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldcart);
        $cart->add($product, $product->id);
        $request->session()->put('cart', $cart);
        return redirect()->route('home')->with('category',$category);   
    }

    public function getReduceByOne($id)
    {
        $category = Category::all();
        $oldcart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldcart);
        $cart->reduceByOne($id);
         if (count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }
        return redirect()->route('cart')->with('category',$category);
    }

    public function getAddByOne($id)
    {
        $category = Category::all();
        $oldcart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldcart);
        $cart->addByOne($id);
        Session::put('cart', $cart);
        return redirect()->route('cart')->with('category',$category);        
    }

    public function getCart()
    {
        $category = Category::all();
        if(!Session::has('cart'))
        {
            return view('cart')->with('category', $category);
        }
        $oldcart = Session::get('cart');
        $cart = new Cart($oldcart);
        return view('cart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice])->with('category',$category);
    }

    public function getCheckout()
    {
        $category = Category::all();
        if(!Session::has('cart'))
        {
            return view('cart')->with('category', $category);
        }
        $oldcart = Session::get('cart');
        $cart = new Cart($oldcart);
        $total = $cart->totalPrice;
        return view('checkout', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice, 'total' => $total])->with('category',$category);    
    }

    public function postCheckout(Request $request)
    {
        $category = Category::all();
        if(!Session::has('cart'))
        {
            return redirect()->route('cart');
        }
        $oldcart = Session::get('cart');
        $cart = new Cart($oldcart);        
        $order = new order();
        $order->cart = serialize($cart);
        $order->name = $request->input('name');
        $order->lastname = $request->input('lastname');
        $order->address = $request->input('address');
        $order->phone = $request->input('phone');
        $order->city = $request->input('city');
        $order->country = $request->input('country');
        Auth::user()->orders()->save($order);
        // $product = $cart->items;
        // dd($product);
        // foreach ($cart->items as $items) {
        //     $product = Product::find($items);
        //     $qty = $items['qty'];
        //     DB::table('products')->decrement('quantity', $qty);
         
        // }
        Session::forget('cart');
        return redirect()->route('home')->with('success', 'successfully ordered');
    }

    public function logout()
    {
 
        Auth::logout();
        return redirect::route('login');

    }
}
