@extends('layouts.adminmaster')
@section('stylesheet')
<link href="{{URL::asset('css/select2.min.css')}}" rel="stylesheet">
@endsection
@section('content')
    <section id="breadcrumb">
      <div class="container">
        <ol class="breadcrumb">
          <li><a href="index.html">Dashboard</a></li>
          <li class="active">Product</li>
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
              <div class="panel-heading main-color-bg">
                <h3 class="panel-title">Edit Product</h3>
                
              </div>
              <div class="panel-body">
              <div class="row">
              
               <form action="{{ route('updateproduct', [$products->id])}}" role='form' class="col-md-6" method="post" enctype="multipart/form-data">
               <input type="hidden" value="{{ csrf_token() }}" name="_token">
                <div class="form-group">
                  <label for="name"> Name</label>
                  <input type="text" class="form-control" name="name" value="{{$products->name}}" />
                </div>
        <div class="form-group">
                  <label for="description"> Description</label>
                   <textarea name="description" class="form-control">{{$products->description}}</textarea>
                </div>                
        <div class="form-group">
                  <label for="price"> Price</label>
                  <input type="text" class="form-control" name="price" value="{{$products->price}}" />
                </div>
                <div class="form-group">
                  <label for="quantity"> Quantity</label>
                  <input type="text" class="form-control" name="quantity" value="{{$products->quantity}}" />
                </div>
                <div class="form-group">
                 {{ Form::label('tags', 'Tags:', ['class' => 'form-spacing-top']) }}
                 {{ Form::select('tags[]', $tags, null, ['class' => 'form-control select2-multi', 'multiple' => 'multiple']) }}
                </div> 
                <div class="form-group">
                  <label for="image"> Image</label>           
                  <input type="file" class="form-control" name="image"/>
                </div>
               <div class="form-group">
               <label for="cat_id">Category</label>
              <select class="form-control" id="cat_id" name="cat_id">
                    @foreach ($category as $category)
                      <option {{ ($category->id == $products->cat_id) ? 'selected' : '' }} value="{{ $category->id }}">
                        {{ $category->name }}
                      </option>
                    @endforeach
              </select>
    </div>﻿
              <button class="btn btn-primary">Update</button>                                        
               </form>
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

    <!-- Modals -->

    <!-- Add Page -->
    <div class="modal fade" id="addPage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form>
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Page</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>Page Title</label>
          <input type="text" class="form-control" placeholder="Page Title">
        </div>
        <div class="form-group">
          <label>Page Body</label>
          <textarea name="editor1" class="form-control" placeholder="Page Body"></textarea>
        </div>
        <div class="checkbox">
          <label>
            <input type="checkbox"> Published
          </label>
        </div>
        <div class="form-group">
          <label>Meta Tags</label>
          <input type="text" class="form-control" placeholder="Add Some Tags...">
        </div>
        <div class="form-group">
          <label>Meta Description</label>
          <input type="text" class="form-control" placeholder="Add Meta Description...">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </form>
    </div>
  </div>
</div>
@endsection


@section('scripts')

  {!! Html::script('js/select2.min.js') !!}

  <script type="text/javascript">
    $('.select2-multi').select2();
    $('.select2-multi').select2().val({!! json_encode($products->tags()->getRelatedIds() )!!}).trigger('change');
  </script>

@endsection
