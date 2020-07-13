<?php

namespace App\Http\Controllers;

use App\Post;
use Image;
use Storage;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::all();
        return view('pages.post.index',compact('posts'));
    }

    public function create()
    {
        return view('pages.post.create');
    }

    public function store(Request $request)
    {
      $image1 = $request->file('url');

    if(isset($image1)){

     $imageName1 = 'post'.'-'.uniqid().'.'.$image1->getClientOriginalExtension();
     if(!Storage::disk('public')->exists('post')){
         Storage::disk('public')->makeDirectory('post');
     }
     $ProductImage1 = Image::make($image1)->resize(1200,800)->save('jpg');
       Storage::disk('public')->put('post/'.$imageName1,$ProductImage1);
       $data['url'] = $imageName1;
   }


       $post = new Post();
       $post->name = $request->name;
       $post->save();
       $post->image()->create(['url'=>$imageName1,]);
       return redirect()->back();

    }

    public function show(Post $post)
    {
        //
    }

    public function edit(Post $post)
    {
      return view('pages.post.edit',compact('post'));
    }

    public function update(Request $request, Post $post)
    {

      $image1 = $request->file('url');

       if(isset($image1)){

           $imageName1 = 'post'.'_'.uniqid().'.'.$image1->getClientOriginalExtension();
           if(!Storage::disk('public')->exists('post')){
             Storage::disk('public')->makeDirectory('post');
           }

           if(Storage::disk('public')->exists('post/'.$post->image->url)){
             Storage::disk('public')->delete('post/'.$post->image->url);
           }

           $PostImage1 = Image::make($image1)->resize(1200,800)->save('jpg');
             Storage::disk('public')->put('post/'.$imageName1,$PostImage1);
             $data['url'] = $imageName1;
       }

        // $data['name'] = $request->name;
        //  Post::where('id',$post->id)->update($data);
        // return redirect()->route('post.index');

        $post->name = $request->name;
        $post->save();
        $post->image()->update(['url'=>$imageName1]);
        return redirect()->route('post.index');


    }

    public function destroy(Post $post)
    {
        if(Storage::disk('public')->exists('post/'.$post->image->url)){
          Storage::disk('public')->delete('post/'.$post->image->url);
        }
        $post->delete();
        $post->image()->delete();
        return redirect()->back();
    }
}
