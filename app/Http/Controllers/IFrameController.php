<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Posts;

class IFrameController extends Controller
{
    public function index(Request $request)
    {
        $post = Posts::findOrFail($request->input('id'));

        return view('iframe', ['post' => $post]);
    }
}
