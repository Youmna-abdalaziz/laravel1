@extends('layouts.app')

@section('content')
<br>
<h3>Post Info </h3>
<b><label>Title:</label></b>
<label>{{$post->title}}</label>
<br>
<b><label>Description:</label></b>
<label>{{$post->description}}</label>
<br>
<br>
<br>
<h3>Creator Info</h3>
<b><label>Name:</label></b>
<label>{{ isset($post->user) ? $post->user->name : 'Not Found'}}</label>
<br>
<b><label>Email:</label></b>
<label>{{ isset($post->user) ? $post->user->email : 'Not Found'}}</label>
<br>
<b><label>Created at:</label></b>
<label>{{ isset($post->user) ? $post->user->created_at->format('l jS \of F Y h:i:s A') : 'Not Found'}}</label>
<br>
<br>
<a href="{{route('posts.index')}}" class="btn btn-success">Back</a>

@endsection
