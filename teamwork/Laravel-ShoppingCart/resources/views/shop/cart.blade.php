@extends('layouts.master')

@include('partials.nav')

@section('title')
	The Bike Shop | My Cart
@endsection

<h1>My Cart</h1>
<ul>
	@if (count($order) > 0)
		@foreach ($order as $item)
			@for ($i = 0; $i < count($products); $i++)
				<ul>
					<li>{{ $products[$i]['name'] }}</li>
				</ul>
			@endfor  
		@endforeach
	@else
		<li>Your cart is empty</li>
	@endif
</ul>