 
 <div class="header-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="user-menu">
                        <ul>
                            <li><a href="#"><i class="fa fa-user"></i> My Account</a></li>
                            <li><a href="#"><i class="fa fa-heart"></i> Wishlist</a></li>
                            <li><a href="cart.html"><i class="fa fa-user"></i> My Cart</a></li>
                            <li><a href="checkout.html"><i class="fa fa-user"></i> Checkout</a></li>
                            
                        </ul>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="header-right">
                       <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }}"><img src="{{URL::asset('img/signin.png')}}"> &nbsp Login</a></li>
                            <li><a href="{{ url('/register') }}"><img src="{{URL::asset('img/signup.png')}}">&nbsp Register</a></li>
                        @else
                            <li class="dropdown">
                            
                                <a href="{{ url('/login') }}" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a> 

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ url('/customer') }}">
                                            Dashboard
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
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
                        @endif
                    </ul>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End header area -->
    
    <div class="site-branding-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="logo">
                        <h1><a href="./"><img src="img/logo.png"></a></h1>
                    </div>
                </div>
                
                <div class="col-sm-6">
                    <div class="shopping-item">
                        <a href="{{route('cart')}}">Cart - <span class="cart-amunt">{{Session::has('cart')? Session::get('cart')->totalPrice:''}}</span> <i class="fa fa-shopping-cart"></i> <span class="product-count">{{Session::has('cart')? Session::get('cart')->totalQty:''}}</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End site branding area -->
    
    <div class="mainmenu-area">
        <div class="container">
            <div class="row">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div> 
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">                        
                        <div class="btn-group">
                            <button type="button" class="btn btn-primary btn-sm btn-cat">Browse By Categories</button>
                            <button type="button" class="btn btn-primary btn-sm dropdown-toggle btn-cat" data-toggle="dropdown" aria-haspopup="true" aria-expanded="">
                                <span class="caret"></span>
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                              <ul class="dropdown-menu">
                                @foreach($category as $category)                                    
                                        <li><a href="#">{{$category->name}}</a></li>
                                @endforeach
                              </ul>  
                        
                        </div>
                        
                        <li class="{{Request::is('shop') ? 'active': '' }}"><a href="{{route('shop')}}">Shop page</a></li>
                        <li class="{{Request::is('cart') ? 'active': '' }}"><a href="{{route('cart')}}">Cart</a></li>
                        <li class="{{Request::is('checkout') ? 'active': '' }}"><a href="{{route('checkout')}}">Checkout</a></li>
                        <li><a href="#">Category</a></li>
                        <li><a href="#">Others</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </div>  
            </div>
        </div>
    </div> <!-- End mainmenu area -->