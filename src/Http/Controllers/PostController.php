<?php

namespace HappyToDev\FlatCms\Http\Controllers;

use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('flat-cms::' . config('flat-cms.template') . '.posts.index', compact('posts'));
    }


    public function show($postId)
    {
        $post = Post::where('id', $postId)->first();
        // dd($post);
        return view('flat-cms::posts.show', compact('post'));
    }
}
