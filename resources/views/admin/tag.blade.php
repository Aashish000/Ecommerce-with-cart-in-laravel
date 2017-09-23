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
                      <div class="col-md-12">
                          <input class="form-control" type="text" placeholder="Filter Posts...">
                      </div>
                </div>
                <br>
          <div class="row">
            <div class="col-md-6">
            <!-- Website Overview -->
            <div class="panel panel-default">
              <div class="panel-heading main-color-bg">
                <h3 class="panel-title">Add Tag</h3>
                
              </div>
              <div class="panel-body">
              <div class="row">
               <form action="{{route('tags.store')}}" role='form' class="col-md-6" method="post" enctype="multipart/form-data">
               <input type="hidden" value="{{ csrf_token() }}" name="_token">
                <div class="form-group">
                  <label for="name"> Name</label>
                  <input type="text" class="form-control" name="name" placeholder="Enter Name" />
                </div>
               <button class="btn btn-primary">ADD</button>                                         
               </form>
               </div>
              </div>
              </div>

          </div>
          <div class="col-md-6">
                <table class="table table-striped table-hover">
                      <tr>
                        <th>S.N</th>
                        <th>Name</th>
                        <th>Created Date </th>
                        <th>Action</th>
                      </tr>
                      <?php $i=1 ?>
                      @if(!$tags->isEmpty())
                      @foreach($tags as $tag)
                      <tr>
                      <td><?php echo $i++ ?></td>
                      <td><a href="{{ route('tags.show', $tag->id) }}">{{$tag->name}}</a></td>
                      <td>{{$tag->created_at}}</td>
                      <td><a class="btn btn-default" href="">Edit</a> <a class="btn btn-danger" href="#">Delete</a></td>
                      </tr>
                      @endforeach
                      @else
                      <tr>
                        <td>
                          No Tags
                        </td>
                      </tr>
                      @endif

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