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
			My Reviews			
		</div>
	
	<div class="row">
        <div class="col-md-8 col-md-offset-2">
            
            
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-responsive ">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Comments</th>
                                <th>Action</th>
                                
                            </tr>
                            </thead>
                            <tbody>
                            
                                @foreach($comments as $comment)
                                <tr>
                                    <td>{{$comment->id}}</td>
                                    <td>
                                        {{$comment->product->name }}
                                    </td>
                                    <td>{{$comment->comment}}</td> 
                                    <td>
                                        <a href="{{ route('comments.edit', $comment->id) }}" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-pencil"></span></a>
                                        <a href="{{ route('comments.delete', $comment->id) }}" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
                                    </td>             
                                    
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
         
        </div>
    </div>
@stop