@extends('layouts.master')

@include('partials.nav')

@section('title')
	The Bike Shop | My Cart
@endsection

@section('content')
	<div class="container">
		 <button href="" class="remove btn btn-default checkout" role="button">Checkout</button>
		<h1 class="cart-head">My Cart</h1>
		@if (count($order) > 0)
		<div class="row cart">
			@for ($i = 0; $i < count($products); $i++)
				<div class="col-sm-6 col-md-4">
				    <div class="thumbnail">
				      <img src="{{ $products[$i]['imgPath'] }}" class="img-responsive" alt="...">
				      <div class="caption">
				        <h3><a href="#">{{ $products[$i]['name'] }}</a></h3>
				        <div class="clearfix">
				        	<div class="pull-left">
				        	<div class="price">${{ $products[$i]['price'] }}.00</div>
					        <div class="quantity">Quantity: {{ $quantities[$i] }}</div>
					        </div>
					        <form action="/cart/remove" method="post" pull-right>
					        	<!-- <a href="" class="btn btn-default pull-right" role="button">Add to Cart</a> -->
					        	{{ csrf_field() }}
					        	<input type="hidden" name="item" value="{{ $products[$i]['id'] }}">
					        	<input type="submit" name="submit" value="Remove" class="btn btn-default pull-right">					        
					        </form>
				        </div>
				      </div>
				    </div>
				</div>
			@endfor 
		</div>	
		@else
			<div class="container cart">
				<h2>Your cart is empty!</h2>
				<h3>It doesn't have to stay that way! Click below to keep shopping</h3>
				<a href="{{ route('product.index') }}" class="btn btn-default" role="button">Continue Shopping</a>
				
			</div>
		@endif
	</div>
@endsection