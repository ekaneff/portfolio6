@extends('layouts.master')

@include('partials.nav')

@section('title')
	The Bike Shop | My Cart
@endsection

@section('content')
<h1 class="cart-head">My Cart</h1>
<div class="container">
	@if (count($order) > 0)
<<<<<<< HEAD
	<div class="row cart">
		@for ($i = 0; $i < count($products); $i++)
				
			{{-- {{ $products[$i]['imgPath'] }}
			{{ $products[$i]['name'] }}
			{{ $products[$i]['price'] }}
			{{ $quantities[$i] }} --}}
			{{-- Build your card here--}}

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
				        <a href="" class="pull-right remove btn btn-default remove" role="button">Remove</a>
			        </div>
			      </div>
			    </div>
			</div>
				
		@endfor 
	</div>	
=======
		@foreach ($order as $item)
			@for ($i = 0; $i < count($products); $i++)
					<li>
					{{ $products[$i]['imgPath'] }}
					{{ $products[$i]['name'] }}
					{{-- Build your card here--}}
					</li>
			@endfor  
		@endforeach
>>>>>>> dc50dd60fecd82b48902933cc3d2f2d2d6ebbf60
	@else
		<h2>Your cart is empty!</h2>
		<h3>It doesn't have to stay that way! Click below to keep shopping</h3>
		<a href="{{ route('product.index') }}" class="btn btn-default" role="button">Continue Shopping</a>
	@endif
</div>
{{--
	@if(count($items) > 0)
	@foreach($items->chunk(3) as $itemChunk)
			<div class="row">
			@foreach($itemChunk as $item)
				<div class="col-sm-6 col-md-4">
				    <div class="thumbnail">
				      <img src="{{ $item->imgPath }}" class="img-responsive" alt="...">
				      <div class="caption">
				        <h3><a href="#">{{ $item->name }}</a></h3>
				        <p class="desc">{{ $item->description }}</p>
				        <div class="clearfix">
				        	<div class="pull-left price">${{ $item->price }}.00</div>
				        	<form action="/cart/add" method="post">
					        	<! <a href="" class="btn btn-default pull-right" role="button">Add to Cart</a> >
					        	<input type="hidden" name="item" value="{{ $item->id }}">
					        	<input type="submit" name="submit" value="Remove" class="btn btn-default pull-right">					        
					        </form>
					        <a href="" class="pull-right wishlist" role="button">Add to WishList</a>
				        </div>
				      </div>
				    </div>
				</div>
			@endforeach
			</div>  --}}
{{-- </div>
@endsection --}}