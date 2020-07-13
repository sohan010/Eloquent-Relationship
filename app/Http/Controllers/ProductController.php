<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::all();
        return view('pages.product.index',compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('pages.product.create',compact('categories'));
    }

    public function store(Request $request)
    {
        $categories = $request->categories;
        unset($request['categories']);
        $product = Product::create($request->all());
        $product->categories()->attach($categories);
        return redirect()->route('product.index');
    }

    public function show(Product $product)
    {
        //
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('pages.product.edit',compact('categories','product'));
    }

    public function update(Request $request, Product $product)
    {
      $categories = $request->categories;
      unset($request['categories']);
      $product->update($request->all());
      $product->categories()->detach($categories);
      $product->categories()->attach($categories);
      return redirect()->route('product.index');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        $product->categories()->detach();
        return redirect()->route('product.index');
    }
}
