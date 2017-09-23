@extends('layouts.master')
@section('content')
    
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Shopping Cart</h2>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End Page title area -->

    <div class="shopping-cart container">
      <div class="clearfix"> <h2>Cart Summary</h2>  </div>
        <div class= "cart-details col-md-9">
          <table class="table table-bordered table-responsive">
            <thead>
              <tr>
                <th>Remove</th>
                <th>Image</th>
                <th>Name</th>
                <th>Unit Price</th>
                <th>Quantity</th>
                <th>Subtotal</th>
              </tr>
            </thead>
            <tbody>
                @if(Session::has('cart'))
                  @foreach($products as $product)
                  <tr>
                    <td></td>
                    <td>
                    <img src="{{asset('uploads/images/'.$product['item']['image'])}}" alt="" height="50" width="50">
                    </td>
                    <td>
                      {{$product['item']['name']}}
                    </td>
                    <td>
                      {{$product['item']['price']}}
                    </td>
                    <td>
                      <a href="{{route('product.addByOne',['id'=>$product['item']['id']])}}">+</a>
                       
                        {{$product['qty']}}
                       
                        <a href="{{route('product.reduceByOne',['id'=>$product['item']['id']])}}">-</a>
                       
                      
                    </td>
                    <td>
                      {{$product['price']}}
                    </td>
                  </tr>
                  @endforeach
                @endif
            </tbody>
          </table>
        </div>
        <div class="cart-total col-md-3"> 
          <h2>Order Summary</h2>
            @if(Session::has('cart'))
                
                  @foreach($products as $product)
                <table class="table table-responsive" style="align:justify">
                  <tr >
                    <td>{{$product['item']['name']}}</td>
                    <td class="pull-right">{{$product['price']}}</td>
                  </tr>
                  @endforeach
               
                  <tr>
                    <th>Total</th>
                    <th class="pull-right">{{ $totalPrice }}</th>
                  </tr>  
                </table>   
                 <div class="row">
                   <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                      <a href="{{route('checkout')}}"><button type="button btn btn-success">Checkout</button></a>
                    </div>
                  </div>                                                    
            @endif
        </div>

      </div
@stop
    