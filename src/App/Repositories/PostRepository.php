<?php

namespace App\Repositories;

use App\Models\Post;
use App\Interfaces\PostRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class PostRepository implements PostRepositoryInterface
{
    public function getAllPosts()
    {
        return Post::all();
    }

    public function getPostById($postId)
    {
        return Post::findOrFail($postId);
    }

    public function deletePost($postId)
    {
        Post::destroy($postId);
    }

    public function createPost(array $postDetails)
    {
        return Post::create($postDetails);
    }

    public function updatePost($postId, array $newDetails)
    {
        return Post::whereId($postId)->update($newDetails);
    }

    public function getFeaturedPosts(int $limit = 6): Collection
    {
        return Post::where('featured', true)
            ->orderBy('created_at', 'desc')
            ->limit($limit)
            ->get();
    }

    public function getLatestPosts(int $limit = 6): Collection
    {
        return Post::orderBy('created_at', 'desc')
            ->limit($limit)
            ->get();
    }
}
