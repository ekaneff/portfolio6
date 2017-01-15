@extends('layouts.master')

@section('title')
	New Entry
@endsection

@section('content')
<a href="/" class="btn btn-warning">Back to list</a>
<h1>New Jounral Entry</h1>
<form action="/items/store" method="post">
	{{csrf_field()}}
  <div class="form-group">
    <label for="title">Title</label>
    <input type="text" class="form-control" id="title" placeholder="Title" name="title">
  </div>
  <div class="form-group">
    <label for="date">Date</label>
    <input type="date" class="form-control" id="date" placeholder="Date" name="date">
  </div>
  <div class="form-group">
    <label for="entry">Entry</label>
    <textarea class="form-control" rows="20" id="entry" name="entry"></textarea>
  </div>
  <button type="submit" class="btn btn-success">Publish</button>
</form>

@endsection