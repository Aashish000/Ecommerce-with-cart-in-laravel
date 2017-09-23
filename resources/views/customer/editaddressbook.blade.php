<script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
</script>
@extends('layouts.customermaster')
@section('content')
	<h3>My Dashboard/<em style="font-size: 14">Addressbook</em></h3> 
	<hr>
		<div class="box-account box-info">
		<div class="box-head">
			Address Book
			<span class="pull-right"><a href="#">Edit</a></span>
		</div>
		<div class="col-set-2">
			<form action="{{ route('addressbook.update')}}" role='form'  method="post" enctype="multipart/form-data">
               <input type="hidden" value="{{ csrf_token() }}" name="_token">
				<div class="form-group">
                  <label for="name"> First Name</label>
                  <input type="text" class="form-control" name="name" value="{{$user->name}}" />
                </div>
                <div class="form-group">
                  <label for="lastname"> Last Name</label>
                  <input type="text" class="form-control" name="lastname" value="{{$user->lastname}}" />
                </div>
                <div class="form-group">
                  <label for="phone"> Phone</label>
                  <input type="text" class="form-control" name="phone" value="{{$user->phone}}" />
                </div>
                <div class="form-group">
                  <label for="address"> Address</label>
                  <input type="text" class="form-control" name="address" value="{{$user->address}}" />
                </div>
                <div class="form-group">
                  <label for="gender"> Gender</label>
                  <input type="text" class="form-control" name="gender" value="{{$user->gender}}" />
                </div>
                <div class="form-group">
                  <label for="city"> City</label>
                  <input type="text" class="form-control" name="city" value="{{$user->city}}" />
                </div>
                <div class="form-group">
                  <label for="state"> State</label>
                  <input type="text" class="form-control" name="state" value="{{$user->state}}" />
                </div>
                <div class="form-group">
                  <label for="country"> Country</label>
                  <input type="text" class="form-control" name="country" value="{{$user->country}}" />
                </div>
                  <button class="btn btn-primary">Update</button>       
			</form>
		</div>
	</div>
@stop