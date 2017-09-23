<!DOCTYPE html>
<!--
  ustora by freshdesignweb.com
  Twitter: https://twitter.com/freshdesignweb
  URL: https://www.freshdesignweb.com/ustora/
-->
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ustora Demo</title>
    
    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>
    
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{URL::asset('css/bootstrap.min.css')}}">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{URL::asset('css/font-awesome.min.css')}}">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{URL::asset('css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/style.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/responsive.css')}}">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
  .box-account {
      border: 1px solid #ccc;
      padding: 15px;
      margin: 0 0 20px;
  } 
  .box-account .box-head {
    border-bottom: 1px solid #f2f2f2;
    margin: 0 0 10px;
    }
</style>
  </head>
  <body>
        @include('partials.header');
            <div class="container">
        <div class="row">
            @if(Auth::guard('web')->user())
            <div class="col-md-3">
                @include('partials.acsidenav')
            </div>
            <div class= "col-md-9">
                @yield('content')
            </div>       
            @else
             @yield('content')
            @endif
        </div>
        </div>
      </div>

        @include('partials.footer');
    

 <!-- Latest jQuery form server -->
    <script src="https://code.jquery.com/jquery.min.js"></script>
    
    <!-- Bootstrap JS form CDN -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    
    <!-- jQuery sticky menu -->
    <script src="{{URL::asset('js/owl.carousel.min.js')}}"></script>
    <script src="{{URL::asset('js/jquery.sticky.js')}}"></script>
    
    <!-- jQuery easing -->
    <script src="{{URL::asset('js/jquery.easing.1.3.min.js')}}"></script>
    
    <!-- Main Script -->
    <script src="{{URL::asset('js/main.js')}}"></script>
    
    <!-- Slider -->
    <script type="text/javascript" src="{{URL::asset('js/bxslider.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('js/script.slider.js')}}"></script>
  </body>
</html>