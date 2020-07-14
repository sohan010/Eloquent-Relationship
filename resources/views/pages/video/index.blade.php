@extends('layouts.app')

@section('content')

  <div class="container">
    <h3 class="text-center mt-5 mb-2">Video Index</h3>
    <a href="{{route('video.create')}}" class="btn btn-primary btn-sm pull-right mb-5" style="float:right">Add New</a>
    <table class="table">
  <thead>

    <tr>
      <th scope="col">SL#</th>
      <th scope="col">Video Title</th>
      <th scope="col">Video Comments</th>
      <th scope="col">Video</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  @foreach($videos as $key=>$video)
    <tr>
      <th>{{$key+1}}</th>
      <td>{{$video->title}}</td>
      <td>
        @foreach($video->comments as $comment)
        <p>{{$comment->comment_body}}</p><br>
        @endforeach
      </td>
      <td>
        <video src="{{url('storage/video/'.$video->video_url)}}" autoplay controls style="height:70px; width:80px;"></video>
      </td>
      <td>
        <form action="{{route('video.destroy',$video->id)}}" method="post">
          @csrf
          @method('DELETE')
        <a href="{{route('video.edit',$video->id)}}" class="btn btn-primary btn-sm">Edit</a>
        <a href="{{route('create.comment',$video->id)}}" class="btn btn-success btn-sm">Comment</a>
        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
      </form>
      </td>
    </tr>
  @endforeach
  </tbody>
</table>
  </div>


</video>
@endsection
