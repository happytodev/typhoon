<?php

namespace App\Models;

use Orbit\Concerns\Orbital;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Relations\Pivot;

class PostTag extends Pivot
{
    use Orbital;

    public $incrementing = true;

    protected $table = 'post_tag';
    
    protected $primaryKey = 'id';


    public static function schema(Blueprint $table)
    {
        $table->id();
        $table->unsignedBigInteger('post_id');
        $table->unsignedBigInteger('tag_id');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'id',
        'post_id',
        'tag_id',
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
}
