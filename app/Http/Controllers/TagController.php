<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Product;
use App\User;
use App\Category;
use Session;
use Redirect;

use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $products = Product::all();
        $category = Category::all();
        $user = user::all();

        $tags = Tag::all();
        return view('admin.tag')->with('tags', $tags)->with('products',$products)->with('user',$user)->with('category',$category); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       Tag::create($request->all());
        Session::flash('success', "added sucessfully");
        return redirect::route('tags.index');     
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $products = Product::all();
        $category = Category::all();
        $user = User::all();
        $tags = Tag::all();
        $tag = Tag::find($id);
        return view('admin.showtag')->with('tag',$tag)->with('products',$products)->with('user',$user)->with('category',$category)->with('tags', $tags);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $products = Product::all();
        $category = Category::all();
        $user = User::all();
        $tags = Tag::all();
        $tag = Tag::find($id);
        return view('admin.edittag')->with('tag',$tag)->with('products',$products)->with('user',$user)->with('category',$category)->with('tags', $tags);
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
        $tag = Tag::find($id);

        $this->validate($request, ['name'=>'required|max:255']);

        $tag->name = $request->name;
        $tag->save();

        Session::flash('success', 'Edited Successfully');
        return redirect()->route('tags.index', $tag->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag = Tag::find($id);
        $tag->products()->detach();
        $tag->delete();
        Session::flash('success', 'Tags Deleted SuccessFully..');
        return redirect()->route('tags.index');
    }
}
