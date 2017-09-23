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
			<ul style="list-style: none;line-height: 35px">
				<li>First Name: {{Auth::user()->name}} </li>
				<li>Last Name: {{Auth::user()->lastname}}</li>
				<li>Mobile No: {{Auth::user()->phone}}</li>
				<li>Address: {{Auth::user()->address}}</li>
				<li>City: {{Auth::user()->address}}</li>
				<li>State: {{Auth::user()->address}}</li>
				<li>Gender: {{Auth::user()->gender}}</li>
				<li>City: {{Auth::user()->city}}</li>
				<li>State: {{Auth::user()->state}}</li>
				<li>Postal Code: {{Auth::user()->postal_code}}</li>
				<li>Country: {{Auth::user()->country}}</li>

			</ul>
		</div>
	</div>
@stop