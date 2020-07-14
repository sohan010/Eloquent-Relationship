@extends('layouts.app')

@section('content')

<div class="container">
  <h2>**{{$post->title}}**</h2>

  <form action="{{url('post/comment/store')}}" method="post" enctype="multipart/form-data">
  @csrf
  <div class="form-row">
    <div class="col-md-4">
      <label for="">Post Comment</label>
      <textarea class="form-control" name="comment_body" rows="5" cols="80"></textarea>
      <input type="hidden" name="post_id" value="{{$post->id}}">
    </div>

  </div>
  <button type="submit" class="mt-3 btn btn-info">Submit</button>
</form>
</div>



@endsection
