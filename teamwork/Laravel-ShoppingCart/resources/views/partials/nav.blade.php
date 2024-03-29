<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/">WD6-International Bikes</a>
      <p class="navbar-text">Leading bike manufacturer since 2003</p> 
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
      	@if(Auth::guest())
      		<li class="main"><a href="{{ url('/login') }}">Login</a></li>
		    <li class="main"><a href="{{ url('/register') }}">Register</a></li>
		    <li class="main"><a href="/cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i> My Cart</a></li>
      	@else
	      	<li class="main"><a href="/cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i> My Cart</a></li>

	      	<li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
	          <ul class="dropdown-menu">
	            <li><a href="{{ url('/orders') }}">Order History</a></li>
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
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

