<script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
</script>
@extends('layouts.customermaster')
@section('content')
    <h3>My Dashboard</h3> 
    <hr>
    <p class="hello">
    <strong style="font-weight: normal"> Hello, Welcome, {{Auth::user()->name}}</strong>
    </p>
     <div class="row">
           <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
              <h2>Your Total: ${{$total}}</h2>
              <form action="route('checkout')" method="post" >
                  
              </form>
           </div>
       </div> 
    <div class="box-account box-info">
        <div class="box-head">
        Confirm Order Product
        </div>
        <div class="col-set-2">
            <ul style="list-style: none;line-height: 35px">
            <h3>Billing Information</h3>
                <li>Name: {{Auth::user()->name}} {{Auth::user()->lastname}} </li>
                <li>Address: {{Auth::user()->address}},</li>
                <li>Mobile No: {{Auth::user()->phone}},</li>
                <li>City: {{Auth::user()->city}},</li>
                <li>Country: {{Auth::user()->country}}</li>
            </ul>   
        </div>  
        </div>          
        <h3>Shipping Information</h3>
        <form action="{{route('postCheckout')}}" role='form' class="col-md-6" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}

                     @foreach($products as $item)
                                <li class="list-group-item">
                                   <input type="text" name="quantity" value=" {{ $item['qty'] }}"> 
                                </li>
                                      
                    @endforeach
                <div class="form-group">
                    <label for="name"> Name</label>
                    <input type="text" class="form-control" name="name" value="{{Auth::user()->name}}"/>
                </div>

                <div class="form-group">
                    <label for="lastname">Last Name</label>
                    <input type="text" class="form-control" name="lastname" value="{{Auth::user()->lastname}}"/>
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" name="address" value="{{Auth::user()->address}}"/>
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" class="form-control" name="phone" value="{{Auth::user()->phone}}"/>
                </div>
                <div class="form-group">
                    <label for="city">city</label>
                    <input type="text" class="form-control" name="city" value="{{Auth::user()->city}}"/>
                </div>
                <div class="form-group">
                    <label for="country">Country</label>
                    <input type="text" class="form-control" name="country" value="{{Auth::user()->country}}"/>
                </div>

                <button class="btn btn-primary">Place Order</button> 

        </form>
    
@stop
  
