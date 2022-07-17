<?php

namespace HappyToDev\Typhoon\Http\Controllers;

use App\Models\Post;
use App\Interfaces\PostRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class HomeController extends Controller
{
    private PostRepositoryInterface $postRepository;

    public function __construct(PostRepositoryInterface $postRepository)
    {
        $this->postRepository = $postRepository;
    }


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
        return $this->postRepository->getFeaturedPosts();
    }
}
