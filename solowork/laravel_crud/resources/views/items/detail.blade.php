@extends('layouts.master')

@section('title')
	{{$entry->title}}
@endsection

@section('content')
	<h1>Super Secret Journal</h1>
	<a href="/" class="btn btn-warning">Back to list</a>

	<h2>{{$entry->title}}</h2>
	<h4>{{$entry->date}}</h4>

	<p>{{$entry->entry}}</p>

@endsection