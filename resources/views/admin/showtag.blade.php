@extends('layouts.adminmaster')
@section('content')
	<section id="breadcrumb">
      <div class="container">
        <ol class="breadcrumb">
          <li><a href="index.html">Dashboard</a></li>
          <li class="active">Tags</li>
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
	                	<h2>{{$tag->name}} Tag <small>{{$tag->products()->count()}}</small></h2>
	                </div>
	                <div class="col-md-1">
	                	<a href="{{route('tags.edit',$tag->id)}}" class="btn btn-primary" >Edit</a>
	                </div>
	                <div class="col-md-1">
	                	<a href="{{route('tags.delete',$tag->id)}}" class="btn btn-primary pull-right">Delete</a>
	                </div>
	            </div>
                <div class="row">
					<div class="col-md-12">
						<table class="table table-responsive ">
							<thead>
							<tr>
								<th>#</th>
								<th>Title</th>
								<th>Tags</th>
								
							</tr>
							</thead>
							<tbody>
								@foreach($tag->products as $product)
								<tr>
									<td>{{$product->id}}</td>
									<td>{{$product->name}}</td>
									<td>
										@foreach($product->tags as $tag)
											<span class="label label-default">{{$tag->name}}</span>
										@endforeach
									</td>
									
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