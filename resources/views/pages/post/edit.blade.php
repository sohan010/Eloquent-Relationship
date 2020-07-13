@extends('layouts.app')

@section('content')

<div class="container">
  <h3 class="my-4">Post Edit</h3>

  <form action="{{route('post.update',$post->id)}}" method="post" enctype="multipart/form-data">
  @csrf
  @method('put')
  <div class="form-row">
    <div class="col-md-4">
      <label for="">Post Name</label>
      <input type="text" name="name" class="form-control" value="{{$post->name}}">
    </div>

    <div class="col-md-4">
      <label for="">Post Image</label>
      <input type="file" name="url" class="btn btn-dark upload" onchange="readURL1(this)">
      <img id="one" src="" alt="img">
    <div class="mt-2">
      <label>Old Image : </label>
      <img src="{{url('storage/post/'.$post->image->url)}}" style="height:60px;">
    </div>
    </div>

  </div>
  <button type="submit" class="mt-3 btn btn-info">Submit</button>
</form>
</div>


<script type="text/javascript">
 var $= jQuery.noConflict();
    function readURL1(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#one')
                    .attr('src', e.target.result)
                    .width(60)
                    .height(60);
            };
            reader.readAsDataURL(input.files[0]);
        }
     }
  </script>


@endsection
