@extends('layouts.app')

@section('content')

<div class="container">
  <h3 class="my-4">Video Create</h3>

  <form action="{{route('video.store')}}" method="post" enctype="multipart/form-data">
  @csrf
  <div class="form-row">
    <div class="col-md-4">
      <label for="">Video Title</label>
      <input type="text" name="title" class="form-control" placeholder="Video Title">
    </div>

    <div class="col-md-4">
      <label for="">Video Url</label>
      <input type="file" name="video_url" class="btn btn-dark upload" >
    </div>

  </div>
  <button type="submit" class="mt-3 btn btn-info">Submit</button>
</form>
</div>

@endsection
