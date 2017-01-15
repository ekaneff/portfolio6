@extends('layouts.master')

@section('title')
	Edit Entry
@endsection

@section('content')
<h1>Edit Jounral Entry</h1>
<form action="/items/{{$entry->id}}/update" method="post">
	{{csrf_field()}}
  <div class="form-group">
    <label for="title">Title</label>
    <input type="text" class="form-control" id="title" value="{{$entry->title}}" name="title">
  </div>
  <div class="form-group">
    <label for="date">Date</label>
    <input type="date" class="form-control" id="date" value="{{$entry->date}}" name="date">
  </div>
  <div class="form-group">
    <label for="entry">Entry</label>
    <textarea class="form-control" rows="20" id="entry" name="entry">{{$entry->entry}}</textarea>
  </div>
  <button type="submit" class="btn btn-success">Publish</button>
</form>

@endsection