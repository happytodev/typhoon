<?php

namespace App\Models;

use Orbit\Concerns\Orbital;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class Configuration extends Model
{
    use Orbital;

    public static $driver = 'json';


    public static function schema(Blueprint $table)
    {
        $table->id();
        // $table->string('name')->required();
        // $table->string('description')->nullable();
        // $table->string('value')->required();
        $table->json('content')->nullable();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        // 'name',
        // 'description',
        // 'value',
        'content'
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
        'content' => 'array',
    ];


}
