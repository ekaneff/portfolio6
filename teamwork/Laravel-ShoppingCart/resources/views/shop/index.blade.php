@extends('layouts.master')

@section('title')
	Bike Shop
@endsection
@include('partials.nav')
@include('partials.header')
@section('content')
<section id="featured">
	<h1>Today's Featured</h1>
	<div class="container">
		<div class="row">
		  <div class="col-sm-6 col-md-4">
		    <div class="thumbnail">
		      <img src="{{ URL::to('src/assets/bike1.jpeg') }}" class="img-responsive" alt="...">
		      <div class="caption">
		        <h3><a href="#">Product Name</a></h3>
		        <p class="desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
		        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
		        consequat.</p>
		        <div class="clearfix">
		        	<div class="pull-left price">$399.00</div>
			        <a href="#" class="btn btn-default pull-right" role="button">Add to Cart</a>
			        <a href="#" class="pull-right wishlist" role="button">Add to WishList</a>
		        </div>
		      </div>
		    </div>
		  </div>
		  <div class="col-sm-6 col-md-4">
		    <div class="thumbnail">
		      <img src="{{ URL::to('src/assets/bike1.jpeg') }}" alt="...">
		      <div class="caption">
		        <h3><a href="#">Product Name</a></h3>
		        <p class="desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
		        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
		        consequat.</p>
		        <div class="clearfix">
		        	<div class="pull-left price">$399.00</div>
			        <a href="#" class="btn btn-default pull-right" role="button">Add to Cart</a>
			        <a href="#" class="pull-right wishlist" role="button">Add to WishList</a>
		        </div>
		      </div>
		    </div>
		  </div>
		  <div class="col-sm-6 col-md-4">
		    <div class="thumbnail">
		      <img src="{{ URL::to('src/assets/bike1.jpeg') }}" alt="...">
		      <div class="caption">
		        <h3><a href="#">Product Name</a></h3>
		        <p class="desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
		        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
		        consequat.</p>
		        <div class="clearfix">
		        	<div class="pull-left price">$399.00</div>
			        <a href="#" class="btn btn-default pull-right" role="button">Add to Cart</a>
			        <a href="#" class="pull-right wishlist" role="button">Add to WishList</a>
		        </div>
		      </div>
		    </div>
		  </div>
		</div>
	</div>
</section>
@endsection