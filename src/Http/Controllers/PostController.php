<?php

namespace HappyToDev\Typhoon\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Str;

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

        $markdown = Str::markdown($post->content);

        return view('typhoon::' . config('typhoon.template') . '.posts.show', compact('post', 'markdown'));
    }
}
