  <div class="list-group">
              <a href="{{route('admin.dashboard')}}" class="list-group-item active main-color-bg">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Dashboard
              </a>
              <a href="{{route('product')}}" class="list-group-item"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Product <span class="badge">{{$products->count()}}</span></a>
              <a href="{{route('category')}}" class="list-group-item"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Categories <span class="badge">{{$category->count()}}</span></a>
              <a href="{{route('user')}}" class="list-group-item"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Users <span class="badge">{{$user->count()}}</span></a>
              <a href="{{route('tags.index')}}" class="list-group-item"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Tags <span class="badge"></span></a>
</div>