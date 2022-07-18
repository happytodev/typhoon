<?php

namespace App\View\Components\Typhoon\Page;

use Illuminate\View\Component;
use App\Repositories\PostRepository;

class LastPosts extends Component
{

    public $latestPostsNumber;

    public $latestPostsTitle;

    public $latestPostsDescription;

    /**
     * Dataset of latest posts
     *
     * @var Post 
     */
    public $latestPostsDataset;


    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        PostRepository $postRepository,
        $latestPostsTitle,
        $latestPostsNumber,
        $latestPostsDescription
    ) {
        //
        $this->postRepository = $postRepository;

        $this->latestPostsTitle = $latestPostsTitle;

        $this->latestPostsNumber = $latestPostsNumber;

        $this->latestPostsDescription = $latestPostsDescription;

        $this->latestPostsDataset = $this->postRepository->getLatestPosts($this->latestPostsNumber);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.typhoon.page.last-posts');
    }
}
