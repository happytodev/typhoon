<?php

namespace HappyToDev\Typhoon\Http\Controllers;

use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;

class HomeController extends Controller
{
    public function index()
    {
        $featuredPosts = $this->getFeaturedPosts();

        $allPosts = Post::all();

        return view('typhoon::' . config('typhoon.template') . '.home.index', compact('featuredPosts', 'allPosts'));
    }



    /**
     * Undocumented function
     *
     * @param integer $limit
     * @return void
     */
    protected function getFeaturedPosts(int $limit = 6): Collection
    {
        return Post::where('featured', true)
            ->orderBy('created_at', 'desc')
            ->limit($limit)
            ->get();
    }
}
