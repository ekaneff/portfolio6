<nav>
	<h1><a href="/">The Bike Shop</a></h1>
	<ul>
	    @if (Auth::guest())
		    <li class="main"><a href="{{ url('/login') }}">Login</a></li>
		    <li class="main"><a href="{{ url('/register') }}">Sign Up</a></li>
		    <li class="main"><a href="/cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i> My Cart</a></li>
		@else
			<li><a href="/cart" class="main"><i class="fa fa-shopping-cart" aria-hidden="true"></i> My Cart</a></li>
		    <li class="dropdown main">
		        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
		            {{ Auth::user()->name }} <span class="caret"></span>
		        </a>
		        <ul class="dropdown-menu" role="menu">
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
</nav>

