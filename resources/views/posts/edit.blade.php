@extends('layouts.app')

@section('content')

   <form action="{{route('posts.update', [$post->id])}}" method="post">
   @method("PUT")
       @csrf
       <div class="form-group">
           <b><label for="exampleInputEmail1">Title</label></b>
           <input name="title" value="{{$post->title}}" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Title">
       </div>
       <div class="form-group">
           <b><label for="exampleInputPassword1">Description</label></b>
           <textarea name="description" class="form-control">{{$post->description}}</textarea>
        </div>
        <div>
        <b><label>Post Creator</label></b>
        <select class="form-control" name="user_id">
            @foreach($users as $user)
                <option value="{{$user->id}}">{{$user->name}}</option>
            @endforeach
        </select>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <br>
    <a href="{{route('posts.index')}}" class="btn btn-success">Back</a>


@endsection
