<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Nid;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('home');
    }

    public function userInfo()
    {
      $user = User::where('id',Auth::user()->id)->first();
      $nids = Nid::where('user_id',Auth::user()->id)->get();
      return view('welcome',compact('user','nids'));
    }

}
