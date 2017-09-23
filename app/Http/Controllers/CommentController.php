<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Product;
use App\Category;
use App\Order;
use App\Tag;
use App\User;
use Auth;
use DB;

use Session;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function view($product_id)
    {
        $products = Product::all();
        $category = Category::all();
        $order = Order::all();
        $tag = Tag::all();
        $user = User::all();
        $product = Product::find($product_id);
        return view('admin.showcomment')->with('product',$product)->with('products',$products)->with('category',$category)->with('order',$order)->with('tag',$tag)->with('user',$user);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category =  Category::all();
        $id = Auth::user()->id;
        $comments = Comment::with('product')->where('user_id', $id)->get(); 
        return view('customer.comment')->with('category',$category)->with('comments',$comments);

    }
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $product_id)
    {
        $this->validate($request, array(
            'name'       =>      'required|max:255',
            'email'      =>      'required|email',
            'comment'    =>      'required|min:5|max:2000',
        ));

        $product = Product::find($product_id);
        $comment = new Comment();
        $comment->name = $request->name;
        $comment->email = $request->email;
        $comment->comment = $request->comment;
        $comment->approved = true;
        $comment->product()->associate($product);
        $comment->user_id = $request->user_id;
        $comment->save();

        Session::flash('success', 'Reviewed');
        return redirect()->route('details', $product->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category =  Category::all();
        $comment = Comment::find($id);
        return view('customer.editcomment')->withComment($comment)->withCategory($category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function update(Request $request, $id)
    {
        $comment = Comment::find($id);
        $this->validate($request, array('comment' => 'required'));
        $comment->comment = $request->comment;
        $comment->save();
        Session::flash('success', 'Comment updated');
        return redirect()->route('comments.index', $comment->product->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $category = Category::all();
        $comment = Comment::find($id);
        return view('customer.deletecomment')->withComment($comment)->withCategory($category);
    }
    public function destroy($id)
    {
        $comment = Comment::find($id);
        $product_id = $comment->product->id;
        $comment->delete();
        Session::flash('success', 'Deleted Comment');
        return redirect()->route('customer.comment', $product_id);
    }
}
