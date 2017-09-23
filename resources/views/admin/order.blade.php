@extends('layouts.adminmaster')
@section('content')
  

    <section id="breadcrumb">
      <div class="container">
        <ol class="breadcrumb">
          <li><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
          <li class="active">Orders</li>
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
                <h3 class="panel-title">Orders</h3>
                
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
                        <th>Last Name</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>City</th>
                        <th>Country</th>
                        <th>Product</th>
                        <th>Action</th>
                      </tr>
                      <?php $i=1 ?>
                      @if(!$order->isEmpty())
                      @foreach($order as $order)
                      <tr>                     
                      <td><?php echo $i++ ?></td>
                      <td>{{$order->name}}</td>
                     <td>{{strip_tags($order->lastname)}}</td>

                      <td>{{$order->phone}}</td>
                      <td>{{$order->address}}</td>
                      <td>{{$order->city}}</td>
                      <td>{{$order->country}}</td>
                      <td>
                          {{$order->user->name}} 
                      </td>
                      
                     <td>{{$order->user->name}}</td>
                    
                      </tr>
                      @endforeach
                      @else
                      <tr>
                        <td>
                          No orders
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