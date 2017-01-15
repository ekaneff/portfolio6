@extends('layouts.master')

@section('content')
	<h1>Super Secret Journal</h1>

	<a href="/items/create" class="btn btn-primary">New Post</a>

	<h2>Previous Posts</h2>

	@if(count($entries) > 0)
		@foreach($entries as $entry)
			<h3><a href="/items/{{$entry->id}}">{{$entry->title}}</a></h3> 
			<a href="/items/{{$entry->id}}/edit" class="btn btn-success">Edit</a>
			<a href="/items/{{$entry->id}}/destroy" class="btn btn-danger">Delete</a>
		@endforeach
	@endif
@endsection