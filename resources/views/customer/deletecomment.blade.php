<script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
</script>
@extends('layouts.customermaster')
@section('content')
	<h3>My Dashboard/<em style="font-size: 14">Order Lists</em></h3> 
	<hr>
		<div class="box-account box-info">
		<div class="box-head">
			Edit Reviews			
		</div>
	
	<div class="row">
        <div class="col-md-8 col-md-offset-2">
            
            
                <div class="row">
                    <div class="col-md-12">
                     <h1>DELETE THIS COMMENT?</h1>
                        <p>
                            <strong>Name:</strong> {{ $comment->name }}<br>
                            <strong>Email:</strong> {{ $comment->email }}<br>
                            <strong>Comment:</strong> {{ $comment->comment }}
                        </p>
                        {{ Form::open(['route' => ['comments.destroy', $comment->id], 'method' => 'DELETE']) }}
                            {{ Form::submit('YES DELETE THIS COMMENT', ['class' => 'btn btn-lg btn-block btn-danger']) }}
                        {{ Form::close() }}
                    </div>
                </div>
         
        </div>
    </div>
@stop