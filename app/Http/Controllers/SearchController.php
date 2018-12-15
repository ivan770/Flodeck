<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use App\Posts;
use App\User;

class SearchController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function Search(Request $request)
    {
        $posts = Posts::where(['tag' => $request->input('tag')])->with("user")->orderByDesc("likes")->orderByDesc("created_at")->simplePaginate(50);
        $tags = Posts::select('tag', 'likes')->orderByDesc("likes")->distinct('tag')->limit(10)->get();
        (count($posts)>0)?$status=200:$status=404;

        return response()->view('search', ['posts' => $posts, 'tags' => $tags], $status);
    }

    public function User(Request $request)
    {
        $name = User::select('name')->where(['id' => $request->input('id')])->firstOrFail();
        $posts = Posts::where(['user_id' => $request->input('id')])->orderByDesc("likes")->orderByDesc("created_at")->simplePaginate(50);
        $postCount = Posts::where(['user_id' => $request->input('id')])->count();
        $tags = Posts::select('tag', 'likes')->orderByDesc("likes")->distinct('tag')->limit(10)->get();

        return view('profile', ['posts' => $posts, 'tags' => $tags, 'name' => $name, 'count' => $postCount]);
    }
}
