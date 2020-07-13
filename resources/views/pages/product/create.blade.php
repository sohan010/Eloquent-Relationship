@extends('layouts.app')

@section('content')

<div class="container">
  <h3 class="my-4">Product Create</h3>

  <form action="{{route('product.store')}}" method="post">
  @csrf
  <div class="form-row">
    <div class="col-md-4">
      <label for="">Category</label>
        <select class="form-control" name="categories[]" multiple>
          @foreach($categories as $category)
          <option value="{{$category->id}}">{{$category->category_name}}</option>
          @endforeach
        </select>
    </div>
    <div class="col-md-4">
      <label for="">Product Name</label>
      <input type="text" name="product_name" class="form-control" placeholder="Product Name">
    </div>
    <div class="col-md-4">
      <label for="">Product Qty</label>
      <input type="text" name="product_qty" class="form-control" placeholder="Product Qty">
    </div>
  </div>
  <button type="submit" class="mt-3 btn btn-info">Submit</button>
</form>
</div>



@endsection
