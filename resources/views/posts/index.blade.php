@extends('layouts.app')
@section('content')
<br>
<br>
<center><a href="{{route('posts.create')}}" class="btn btn-success">Create Post</a></center>
<br>
<br>
  <table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Title</th>
      <th scope="col">Description</th>
      <th scope="col">Creator Name</th>
      <th scope="col">Created_at</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($posts as $post)
    <tr>
      <th scope="row">{{$post->id}}</th>
      <td>{{$post->title}}</td>
      <td>{{$post->description}}</td>
      <td>{{ isset($post->user) ? $post->user->name : 'Not Found'}}</td>
      <td>{{$post->created_at->format('Y - m - d')}}</td>
      <td><a href="{{route('posts.show',[$post->id,$post->user_id])}}" class="btn btn-primary">View</a>
      <a href="{{route('posts.edit',[$post->id])}}" class="btn btn-success">Edit</a>
      <form action="{{route('posts.destroy', [$post->id])}}" method="post">
   @method("DELETE")
    @csrf
    <!-- <h2>Are you Sure you want to delete</h2> -->
    <!--a class="btn btn-danger" onclick="return confirm('Are you sure?')" href="{{route('posts.destroy', $post->id)}}"><i class="fa fa-trash"></i></a>-->
    <button type="submit" onclick="return confirm ('Are you sure?')"class="btn btn-danger">Delete</button>
   </form>
   </td>
    </tr>
@endforeach
</tbody>
</table>
@endsection