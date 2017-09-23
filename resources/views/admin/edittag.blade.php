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
               
                <br>
		          <div class="row">
		            
		            <!-- Website Overview -->
		            <div class="panel panel-default">
		              <div class="panel-heading main-color-bg">
		                <h3 class="panel-title">Add Tag</h3>
		                
		              </div>
		              <div class="panel-body">
		              	<div class="row">
		              	{{ Form::model($tag, ['route' => ['tags.update', $tag->id], 'method' => "PUT"]) }}
		              		{{ Form::label('name', "Name:") }}
		              		{{ Form::text('name', null, ['class' => 'form-control']) }}<br/>
		              		{{ Form::submit('Save Changes', ['class'=>'btn btn-success'])}}
		              	{{Form::close()}}
		              	</div>
		              </div>
		            </div>         
		        </div>
          </div>
          </div>
          </div>
          </div>
          </div>
          </section>



@endsection