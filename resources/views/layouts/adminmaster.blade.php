<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <title>{{ config('app.name', 'Store') }}</title>
    <!-- Bootstrap core CSS -->
    <link href="{{URL::asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('css/adminstyle.css')}}" rel="stylesheet">
    @yield('stylesheet')
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="{{URL::asset('js/bootstrap.min.js')}}"></script>
    <script src="http://cdn.ckeditor.com/4.6.1/standard/ckeditor.js"></script>
    

     <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
  </head>
  <body>

    <nav class="navbar navbar-default">
        
   @if (!Auth::guard('admin')->user())
      
        <ul class="nav navbar-nav navbar-right">
        <li><a href="{{ url('/login') }}">Login</a></li>
        <li><a href="{{ url('/register') }}">Register</a></li>
    </ul>
    
    
    @else
        <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="{{ url('/admin') }}">Store</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
            <li><a href="{{route('product')}}">Product</a></li>
            <li><a href="{{route('category')}}">Categories</a></li>
            <li><a href="{{route('user')}}">Users</a></li>
            <li><a href="users.html">Order</a></li>
            <li><a href="users.html">OrderHistory</a></li>


          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Welcome, {{Auth::user()->name}}</a></li>
            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    
      @endif
    </nav>
    @include('partials.adminheader')
      <div>
        @yield('content')
      </div>
  <script>
     CKEDITOR.replace( 'description' );
 </script>
    @yield('scripts')
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    
    

   
  </body>
</html>
