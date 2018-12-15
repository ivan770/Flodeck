<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Posts;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Posts::with("user")->orderByDesc("likes")->orderByDesc("created_at")->simplePaginate(50);
        $tags = Posts::select('tag', 'likes')->orderByDesc("likes")->distinct('tag')->limit(10)->get();
        $myposts = Posts::where(['user_id' => Auth::id()])->count();
        return view('home', ['posts' => $posts, 'myposts' => $myposts, 'tags' => $tags]);
    }
}
