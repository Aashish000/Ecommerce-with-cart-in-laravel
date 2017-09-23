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
	<p>
	From your My Account Dashboard you have the ability to view a snapshot of your recent account activity and update your account information.
	</p>
	<div class="box-account box-info">
		<div class="box-head">
			Account Details
		</div>
		<div class="col-set-2">
			<ul style="list-style: none;line-height: 35px">
				<li>First Name: {{Auth::user()->name}} </li>
				<li>Last Name: {{Auth::user()->lastname}}</li>
				<li>Email Name: {{Auth::user()->email}}</li>
				<li>Mobile No: {{Auth::user()->phone}}</li>
				<li>Address: {{Auth::user()->address}}</li>
				<li>Gender: {{Auth::user()->gender}}</li>
				
			</ul>
		</div>
	</div>
@stop