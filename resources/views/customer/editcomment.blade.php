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
                       {{Form::model($comment, ['route'=>['comments.update',$comment->id],'method'=>'PUT'])}}
                            {{ Form::label('email', 'Name:') }}
                            {{ Form::text('name', null, ['class' => 'form-control', 'disabled' => '']) }}
                            
                            {{ Form::label('email', 'Email:') }}
                            {{ Form::text('email', null, ['class' => 'form-control', 'disabled' => '']) }}
                            
                            {{ Form::label('comment', 'Comment:') }}
                            {{ Form::text('comment', null, ['class' => 'form-control']) }}
                            

                            {{ Form::submit('Update Comment', ['class' => 'btn btn-block btn-success', 'style' => 'margin-top: 15px;']) }}
                       {{Form::close()}}
                    </div>
                </div>
         
        </div>
    </div>
@stop