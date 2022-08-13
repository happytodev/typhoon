<?php

namespace HappyToDev\Typhoon\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {

        return view('typhoon::' . config('typhoon.template') . '.posts.index', [
            'posts' => Post::where('status', 'published')
                                ->orderBy('created_at', 'desc')
                                ->paginate(setting('posts.perpage'))
        ]);
    }


    public function show($slug)
    {
        $post = Post::where('slug', $slug)
                        ->where('status', 'published')
                        ->firstOrFail();

        if ($post->status == 'published') {
            $markdown = Str::markdown($post->content);

            return view('typhoon::' . config('typhoon.template') . '.posts.show', compact('post', 'markdown'));
        }

    }
}
