@extends('layouts.app')

@section('content')

  <div class="container">
    <h3 class="text-center mt-5 mb-2">Post Index</h3>
    <a href="{{route('post.create')}}" class="btn btn-primary btn-sm pull-right mb-5" style="float:right">Add New</a>
    <table class="table">
  <thead>

    <tr>
      <th scope="col">SL#</th>
      <th scope="col">Post Name</th>
      <th scope="col">Post Comemnt</th>
      <th scope="col">Image</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  @foreach($posts as $key=>$post)
    <tr>
      <th>{{$key+1}}</th>
      <td>{{$post->name}}</td>
      <td>
        @foreach($post->comments as $comment)
        <p>{{$comment->comment_body}}</p><br>
        @endforeach
      </td>
      <td>
        <img src="{{url('storage/post/'.$post->image->url)}}" style="height:40px;">
      </td>
      <td>
        <form action="{{route('post.destroy',$post->id)}}" method="post">
          @csrf
          @method('DELETE')
        <a href="{{route('post.edit',$post->id)}}" class="btn btn-primary btn-sm">Edit</a>
        <a href="{{url('post/comment/create/'.$post->id)}}" class="btn btn-success btn-sm">Comment</a>
        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
      </form>
      </td>
    </tr>
  @endforeach
  </tbody>
</table>
  </div>

@endsection
