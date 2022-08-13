<?php

namespace App\Models;

use Orbit\Concerns\Orbital;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use BeyondCode\Comments\Traits\HasComments;

class Post extends Model
{
    use Orbital;

    use HasComments;

    public static function schema(Blueprint $table)
    {
        $table->id();
        $table->string('title');
        $table->string('tldr')->nullable();
        $table->string('slug')->unique();
        $table->text('content')->nullable();
        $table->boolean('featured')->default(false);
        $table->unsignedBigInteger('user_id');
        $table->unsignedBigInteger('category_id');
        $table->string('main_image')->nullable();
        $table->string('status')->default('draft');
        $table->dateTime('published_at')->nullable();
        $table->dateTime('unpublished_at')->nullable();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'title',
        'tldr',
        'slug',
        'content',
        'featured',
        'user_id',
        'category_id',
        'main_image',
        'status',
        'published_at',
        'unpublished_at'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
    ];


    /**
     * Find user associated with this post
     *
     * @return User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Find category associated with this post
     *
     * @return Category
     *
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Get posts from this user
    public function tags()
    {
        return $this->belongsToMany(Tag::class)->withPivot('id')->using(PostTag::class);
    }

    // Get the posts have to be published
    public function scopeToBePublished($query)
    {
        return $query->where('status', 'scheduledtopublish')->where('published_at', '<=', now())->get();
    }

    // Get the posts have to be published
    public function scopeToBeUnpublished($query)
    {
        return $query->where('status', 'scheduledtounpublish')->where('unpublished_at', '<=', now())->get();
    }

    // Procceed publishing for every posts catched by scopeToBePublished function
    public static function updatePostToBePublished()
    {
        foreach (Post::toBePublished() as $post) {
            $post->update([
                'status' => 'published',
                'published_at' => now()
            ]);
            Log::debug('The post with id : #' . $post->id . ' was updated with status PUBLISHED at ' . now());

        }
    }

    // Procceed publishing for every posts catched by scopeToBePublished function
    public static function updatePostToBeUnpublished()
    {
        foreach (Post::toBeUnpublished() as $post) {
            $post->update([
                'status' => 'unpublished',
                'unpublished_at' => now()
            ]);
            Log::debug('The post with id : #' . $post->id . ' was updated with status UNPUBLISHED at ' . now());
        }
    }
}
