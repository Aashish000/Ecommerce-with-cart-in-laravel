<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\User;
use App\Tag;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddProduct;
use Input;
use Session;
use File;
use Redirect;
use Storage;
use Image;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::all();
        $user = User::all();
        $products = Product::with('category')->get();
        return view('admin.product')->with('products',$products)->with('category',$category)->with('user',$user);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $products =Product::all();
       $user = User::all();
       $category = Category::all();
       $tags = Tag::all();

       return view('admin.addproduct')->with('category',$category)->with('products',$products)->with('user',$user)->with('tags',$tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddProduct $request)
    {

      $products = new Product;

      $products->name = $request->name;
      $products->description = $request->description;
      $products->price = $request->price;
      $products->quantity = $request->quantity;

      $products->cat_id = $request->cat_id;
      //add image 
      if($request->hasFile('image')){
        $image = $request->file('image');
        $filename = time() . '.' . $image->getClientOriginalExtension();
        $location = public_path('uploads/images/' . $filename);
        Image::make($image)->resize(800,400)->save($location);
        $products->image = $filename;
      }
      $products->save();

      $products->tags()->sync($request->tags, false);
     
      Session::flash('success', "added sucessfully");
       return redirect::route('product',$products->id);
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
        $products = Product::find($id);
        $category = Category::all();
        $tags = Tag::all();
        $tags2 = array();
        foreach ($tags as $tag) {
            $tags2[$tag->id] = $tag->name;
        }
        $user = User::all();
        return view('admin.editproduct')->with('products',$products)->with('category',$category)->with('user',$user)->with('tags',$tags2);
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
        $products = Product::find($id);

          $products->name = $request->name;
          $products->description = $request->description;
          $products->price = $request->price;
          $products->quantity = $request->quantity;

          $products->cat_id = $request->cat_id;
         if($request->hasFile('image')){

            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('uploads/images/' . $filename);
            Image::make($image)->save($location);

            $oldfilename =  $products->image;
            //update the db
            $products->image = $filename;
            //delete the old image 
            Storage::delete($oldfilename);
        }
        $products->save();

            if (isset($request->tags)) {
                $products->tags()->sync($request->tags);
            } else {
                $products->tags()->sync(array());
            }
          
        Session::flash('success', 'This post was successfully saved.');
        return redirect::route('product',$products->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $products = Product::find($id);
        $products->tags()->detach();
        $products->delete($products);

        Session::flash('success', 'Product Deleted SuccessFully..');
        return redirect::route('product');
    }
}
