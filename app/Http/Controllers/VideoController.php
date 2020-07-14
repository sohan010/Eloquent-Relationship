<?php

namespace App\Http\Controllers;

use App\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{

    public function index()
    {
        $videos = Video::all();
        return view('pages.video.index',compact('videos'));
    }

    public function create()
    {
        return view('pages.video.create');
    }

    public function store(Request $request)
    {
      //Video File Insert
        if($request->file('video_url')){
             $file = $request->file('video_url');
             $filename = 'video_'.time(). '.'.$file->getClientOriginalExtension();
             $file->move(base_path('public/storage/video/'), $filename);
           }

      $data['title'] = $request->title;
      $data['video_url'] = $filename;
      Video::create($data);
      return redirect()->route('video.index');

    }

    public function show(Video $video)
    {
        //
    }

    public function edit(Video $video)
    {
        //
    }

    public function update(Request $request, Video $video)
    {
        //
    }

    public function destroy(Video $video)
    {
        $video->delete();
        $video->comments()->delete();
        return redirect()->back();
    }

    //Custom Create for index page
    public function CreateComment($id)
    {
        $video = Video::find($id);
        return view('pages.comment.video_comment',compact('video'));
    }

    public function CommentStore(Request $request)
    {
      //Video id pased from create blade as hidden
        $video = Video::find($request->video_id);
        $video->comments()->create(['comment_body'=>$request->comment_body]);
        return redirect()->route('video.index');
    }
}
