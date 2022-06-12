<?php

namespace HappyToDev\Typhoon\Http\Controllers;

use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        
        $posts = Post::orderBy('created_at', 'desc')->get();
        return view('typhoon::' . config('typhoon.template') . '.posts.index', compact('posts'));
    }


    public function show($slug)
    {
        $post = Post::where('slug', $slug)->first();
        // dd($post);
        return view('typhoon::posts.show', compact('post'));
    }
}
