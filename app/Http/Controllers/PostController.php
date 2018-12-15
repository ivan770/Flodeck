<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Posts;
use App\Likes;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function Create(Request $request)
    {
        $request->validate([
            'post' => 'required|string|max:512',
            'tag' => 'required|string|min:3|max:24'
        ]);

        Posts::create(['post' => $request->input('post'), 'user_id' => Auth::id(), 'tag' => $request->input('tag')]);

        return back();
    }

    public function UpvoteToggle(Request $request)
    {
        $request->validate([
            'id' => 'required|numeric'
        ]);

        $like = Likes::firstOrCreate(['user' => Auth::id(), 'post' => $request->input('id')]);

        if ($like->wasRecentlyCreated) {
            Posts::where(['id' => $request->input('id')])->increment('likes');
        } else {
            Likes::where(['user' => Auth::id(), 'post' => $request->input('id')])->delete();
            Posts::where(['id' => $request->input('id')])->decrement('likes');
        }

        return back();
    }
}
