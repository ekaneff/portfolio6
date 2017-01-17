@extends('layouts.master')

@section('title')
	The Bike Shop | Order History
@endsection

@include('partials.nav')

<h1>Order History</h1>

@for ($i = 1; $i < $count; $i++)
	{{-- For each $count (order), create a row--}}
	<div class="row cart">
		<h2>Order #{{ $i }}</h2>
		{{-- For each $product in order, create a card--}}
		@foreach ($orders as $order)
			@if ($order['attributes']['orderNumber'] == $i)
				<div class="col-sm-6 col-md-4">
					<div class="thumbnail">
						@foreach ($products as $product)
							@if ($product['id'] == $order['attributes']['product_id'])
						      <img src="{{ $product['imgPath'] }}" class="img-responsive" alt="...">
						      <div class="caption">
						        <h3><a href="#">{{ $product['name'] }}</a></h3>
						        <div class="clearfix">
						        	<div class="pull-left">
						        		<div class="price">${{ $product['price'] }}.00</div>
							        	<div class="quantity">Quantity: {{ $order['attributes']['quantity'] }}</div>
							        </div>
						        </div>
						      </div>
							@endif
						@endforeach 
					</div>
				</div>
			@endif
		@endforeach
	</div>
@endfor



	



{{-- 	<div class="col-sm-6 col-md-4">
	    <div class="thumbnail">
	      <img src="{{ $products[$i]['imgPath'] }}" class="img-responsive" alt="...">
	      <div class="caption">
	        <h3><a href="#">{{ $products[$i]['name'] }}</a></h3>
	        <div class="clearfix">
	        	<div class="pull-left">
	        	<div class="price">${{ $products[$i]['price'] }}.00</div>
		        <div class="quantity">Quantity: {{ $quantities[$i] }}</div>
		        </div>
	        </div>
	      </div>
	    </div>
	</div> --}}