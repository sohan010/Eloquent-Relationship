@extends('layouts.app')

@section('content')

  <div class="container">
    <h3 class="text-center mt-5 mb-2">Product Index</h3>
    <a href="{{route('product.create')}}" class="btn btn-primary btn-sm pull-right mb-5" style="float:right">Add New</a>
    <table class="table">
  <thead>

    <tr>
      <th scope="col">SL#</th>
      <th scope="col">Category</th>
      <th scope="col">Product Name</th>
      <th scope="col">Product Qty</th>
      <th scope="col">Created At</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  @foreach($products as $key=>$product)
    <tr>
      <th>{{$key+1}}</th>
      <td>
        @foreach($product->categories as $cat)
        <span class="badge badge-success">{{$cat->category_name }}</span>
      @endforeach
      </td>
      <td>{{$product->product_name}}</td>
      <td>{{$product->product_qty}}</td>
      <td>{{$product->created_at->diffForHumans()}}</td>
      <td>
        <form action="{{route('product.destroy',$product->id)}}" method="post">
          @csrf
          @method('DELETE')
        <a href="{{route('product.edit',$product->id)}}" class="btn btn-success btn-sm">Edit</a>
        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
      </form>
      </td>
    </tr>
  @endforeach
  </tbody>
</table>
  </div>

@endsection
