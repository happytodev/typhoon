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
        $table->string('slug')->nullable();
        $table->text('content')->nullable();
        $table->unsignedBigInteger('user_id');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'title',
        'tldr',
        'content',
        'slug'
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


    // Get picture 
    // public function posts()
    // {
    //     return $this->hasMany(Post::class);
    // }

}
