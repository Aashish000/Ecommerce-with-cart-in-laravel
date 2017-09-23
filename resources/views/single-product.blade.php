@extends('layouts.master')
@section('content')
     
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Shop</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Search Products</h2>
                        <form action="">
                            <input type="text" placeholder="Search products...">
                            <input type="submit" value="Search">
                        </form>
                    </div>
                    
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Products</h2>
                        <div class="thubmnail-recent">
                            <img src="img/product-thumb-1.jpg" class="recent-thumb" alt="">
                            <h2><a href="">Sony Smart TV - 2015</a></h2>
                            <div class="product-sidebar-price">
                                <ins>$700.00</ins> <del>$100.00</del>
                            </div>                             
                        </div>
                        <div class="thubmnail-recent">
                            <img src="img/product-thumb-1.jpg" class="recent-thumb" alt="">
                            <h2><a href="">Sony Smart TV - 2015</a></h2>
                            <div class="product-sidebar-price">
                                <ins>$700.00</ins> <del>$100.00</del>
                            </div>                             
                        </div>
                        <div class="thubmnail-recent">
                            <img src="img/product-thumb-1.jpg" class="recent-thumb" alt="">
                            <h2><a href="">Sony Smart TV - 2015</a></h2>
                            <div class="product-sidebar-price">
                                <ins>$700.00</ins> <del>$100.00</del>
                            </div>                             
                        </div>
                        <div class="thubmnail-recent">
                            <img src="img/product-thumb-1.jpg" class="recent-thumb" alt="">
                            <h2><a href="">Sony Smart TV - 2015</a></h2>
                            <div class="product-sidebar-price">
                                <ins>$700.00</ins> <del>$100.00</del>
                            </div>                             
                        </div>
                    </div>
                    
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Recent Posts</h2>
                        <ul>
                            <li><a href="">Sony Smart TV - 2015</a></li>
                            <li><a href="">Sony Smart TV - 2015</a></li>
                            <li><a href="">Sony Smart TV - 2015</a></li>
                            <li><a href="">Sony Smart TV - 2015</a></li>
                            <li><a href="">Sony Smart TV - 2015</a></li>
                        </ul>
                    </div>
                </div>
                
                <div class="col-md-8">
                    <div class="product-content-right">
                        <div class="product-breadcroumb">
                            <a href="">Home</a>
                            <a href="">Category Name</a>
                            <a href="">Sony Smart TV - 2015</a>
                        </div>
                       
                        <div class="row">
                            <div class="col-sm-6">
                            
                                <div class="product-images">
                                
                                    <div class="product-main-img">
                                        <img src="{{asset('uploads/images/'.$product->image)}}" style="height:390px" alt="{{$product->image}}" />
                                    </div>
                               
                                    <div class="product-gallery">
                                        <img src="img/product-thumb-1.jpg" alt="">
                                        <img src="img/product-thumb-2.jpg" alt="">
                                        <img src="img/product-thumb-3.jpg" alt="">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-sm-6">
                         
                                <div class="product-inner">
                                    <h2 class="product-name">{{$product->name}}</h2>
                                    <div class="product-inner-price">
                                        <ins></ins> <del>$100.00</del>
                                    </div>    
                                    
                                    <form action="{{ route('customer.order', [$product->id])}}" class="cart">
                                        
                                        <button class="add_to_cart_button" type="submit">Order</button>
                                    </form>   
                                    
                                    <div class="product-inner-category">
                                        <p>
                                        Category: <a href="">{{$product->category->name}}</a>. 
                                        Tags: 
                                        @foreach($product->tags as $tag)
                                        <a href="">{{$tag->name}}</a> 
                                        @endforeach 
                                        </p>
                                    </div> 
                                    
                                    <div role="tabpanel">
                                        <ul class="product-tab" role="tablist">
                                            <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Description</a></li>
                                            <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Reviews</a></li>
                                        </ul>
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade in active" id="home">
                                                <h2>Product Description</h2>  
                                                <p>{!!$product->description!!}</p>                                             
                                            </div>
                                            
                                            <div role="tabpanel" class="tab-pane fade" id="profile">
                                                <h2>Reviews</h2>
                                                <div class="submit-review">
                                                   @if (Auth::check())
                            
                                                        {{Form::open(['route'=>['comments.store',$product->id], 'method'=>'POST'])}}
                                                            <div class="row">
                                                            <div class="col-md-6">
                                                            {{Form::label('name',"Name:")}}
                                                            {{Form::text('name',null, ['class'=>'form-control'])}}
                                                            </div>
                                                            <div class="col-md-6">
                                                            {{Form::label('email',"Email:")}}
                                                            {{Form::text('email',null, ['class'=>'form-control'])}}
                                                            </div>
                                                            <div class="col-md-12">
                                                            {{Form::label('comment',"Comment:")}}
                                                            {{Form::textarea('comment',null, ['class'=>'form-control'])}}
                                                             
                                                             <input type="hidden" class="form-control" name="user_id" value="{{Auth::user()->id}}">
                                                             
                                                            {{Form::submit('Add Comment'), ['class'=>'btn btn-success']}}
                                                            </div>
                                                            </div>
                                                        {{Form::close()}}
                                                    @else
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                        <span>Please Login To Review</span>
                                                        </div>
                                                    @endif
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        
                        
                        <div class="related-products-wrapper">
                            <div class="row">
                            
                            <h4 class="related-products-title"><span class="glyphicon glyphicon-comment"></span>{{$product->comments->count()}}  &nbsp Reviews</h4>
                            <hr/>
                            
                                <div class="col-md-8">
                                    @foreach($product->comments as $comment)
                                    <div class="comment">
                                        <div class="author-info">
                                            <img src="{{ 'https://www.gravatar.com/avatar/' . md5(strtolower(trim($comment->email))) . '?s=50&d=monsterid' }}" class="author-image">

                                            <div class="author-name">
                                            <h4>{{$comment->name}}</h4>
                                            <p class="author-time">{{$comment->created_at}}</p>
                                            </div>
                                            
                                            
                                        </div>
                                        <div class="comment-content">
                                            {{$comment->comment}}
                                        </div>
                                    </div>

                                    @endforeach
                                </div>
                            </div>
                            <hr>
                            
                                
                        </div>
                    </div>                    
                </div>
            </div>
        </div>
    </div>

   
@stop