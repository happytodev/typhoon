<?php

namespace App\View\Components\Typhoon\Page;

use App\Models\Post;
use Illuminate\View\Component;
use App\Interfaces\PostRepositoryInterface;

class FeaturedPosts extends Component
{
    private PostRepositoryInterface $postRepository;

    /**
     * Number of featured posts to display
     *
     * @var integer
     */
    public $featuredPostsNumber;

    public $featuredPostsTitle;

    public $featuredPostsDescription;

    /**
     * Dataset of featured posts
     *
     * @var Post
     */
    public $featuredPostsDataset;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        PostRepositoryInterface $postRepository,
        $featuredPostsTitle,
        $featuredPostsNumber,
        $featuredPostsDescription
    ) {
        //
        $this->postRepository = $postRepository;

        $this->featuredPostsTitle = $featuredPostsTitle;
 
        $this->featuredPostsNumber = $featuredPostsNumber;

        $this->featuredPostsDescription = $featuredPostsDescription;

        $this->featuredPostsDataset = $this->postRepository->getFeaturedPosts($this->featuredPostsNumber);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.typhoon.page.featured-posts');
    }
}
