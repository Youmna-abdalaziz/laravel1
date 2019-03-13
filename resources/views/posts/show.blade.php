@extends('layouts.app')

@section('content')
<a href="{{route('posts.index')}}" class="btn btn-success">Back</a>
<h3>Post Info </h3>
<label>Title:</label>
<label>{{$post->title}}</label>
<br>
<label>Description:</label>
<label>{{$post->description}}</label>
@endsection
