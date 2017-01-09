@extends('layouts.master')

@include('partials.nav')

@section('title')
	The Bike Shop | My Cart
@endsection

<h1>My Cart</h1>
<ul>
	@if(count($items) > 0)
		@foreach ($items as $item)
	    	<li>{{ $item->name }}</li>
		@endforeach
	@else
		<li>Your cart is empty</li>
	@endif
</ul>