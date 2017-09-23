@extends('layouts.adminmaster')
@section('content')
	<section id="breadcrumb">
      <div class="container">
        <ol class="breadcrumb">
          <li><a href="index.html">Dashboard</a></li>
          <li class="active">Comments</li>
        </ol>
      </div>
    </section>

    <section id="main">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
          @include('partials.sidenav');
          </div>
          <div class="col-md-9">
            <!-- Website Overview -->
            <div class="panel panel-default">
              
              <div class="panel-body">
              	<div class="row">
	              	<div class="col-md-10">
	                	<h2>{{$product->name}}<small>({{$product->comments()->count()}})</small></h2>
	                </div>
	                <div class="col-md-1">
	                	<a href="" class="btn btn-primary pull-right">Delete</a>
	                </div>
	            </div>
                <div class="row">
					<div class="col-md-12">
						<table class="table table-responsive ">
							<thead>
							<tr>
								<th>#</th>
								<th>Name</th>
								<th>Email</th>
								<th>Comments</th>
								
							</tr>
							</thead>
							<tbody>
								@foreach($product->comments as $comment)
								<tr>
									<td>{{$comment->id}}</td>
									<td>{{$comment->name}}</td>
									<td>{{$comment->email}}</td>
									<td>{{$comment->comment}}</td>				
									
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>

              </div>
            </div>

          </div>
        </div>
      </div>
    </section>

    <footer id="footer">
      <p>Copyright AdminStrap, &copy; 2017</p>
    </footer>



@endsection