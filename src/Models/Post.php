<?php

namespace App\Models;

use Orbit\Concerns\Orbital;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;

class Post extends Model
{
    use Orbital;

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
        'main_image'
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

    // gitflow.path.hooks=/Users/happytodev/Packages/flat-cms/.git/hooks


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




    // Get picture 
    // public function posts()
    // {
    //     return $this->hasMany(Post::class);
    // }

}
