@extends('layouts.adminmaster')
@section('content')
  

    <section id="breadcrumb">
      <div class="container">
        <ol class="breadcrumb">
          <li><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
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
                <a href="{{route('addproduct')}}">
                <h3 class="panel-title pull-right glyphicon glyphicon-plus"></h3>
                </a>
                <h3 class="panel-title">Product</h3>
                
              </div>
              <div class="panel-body">
                <div class="row">
                    <div>
                      @include('partials.message')
                    </div>
                      <div class="col-md-12">
                          <input class="form-control" type="text" placeholder="Filter Posts...">
                      </div>
                </div>
                <br>
                <table class="table table-striped table-hover">
                      <tr>
                        <th>S.N</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Comments</th>
                        <th>Tags</th>
                        <th>Image</th>
                        <th>Categories</th>
                        <th>Action</th>
                      </tr>
                      <?php $i=1 ?>
                      @if(!$products->isEmpty())
                      @foreach($products as $product)
                      <tr>                     
                      <td><?php echo $i++ ?></td>
                      <td>{{$product->name}}</td>
                     <td>{{strip_tags($product->description)}}</td>
                     <!--   <td>{!!$product->description!!}</td> -->
                      <td>{{$product->price}}</td>
                      <td>
                      @if($product->comments()->count()>0)
                      <a href="{{route('comments.view', $product->id)}}">{{$product->comments()->count()}} Reviews</a>
                      @else
                      <a href="{{route('comments.view', $product->id)}}" class="btn disabled">{{$product->comments()->count()}} Reviews</a>
                      @endif
                      </td>
                      <td>@foreach($product->tags as $tag)
                            <a href="">{{$tag->name}}</a> 
                          @endforeach
                      </td>
                      <td><img src="{{asset('uploads/images/'.$product->image)}}" alt="{{$product->name}}" height="50" width="50"></td>
                    <td>{{ $product->category->name }}</td>
                    

                      <td><a class="btn btn-default" href="{{route('editproduct',[$product->id])}}">Edit</a> <a class="btn btn-danger" href="{{route('deleteproduct',[$product->id])}}">Delete</a></td>
                      </tr>
                      @endforeach
                      @else
                      <tr>
                        <td>
                          No products
                        </td>
                      </tr>
                      @endif

                    </table>
                    
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
          <textarea name="description" class="form-control" placeholder="Page Body"></textarea>
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

@stop