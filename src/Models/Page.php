<?php

namespace App\Models;

use Orbit\Concerns\Orbital;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Filament\Models\Contracts\FilamentUser;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use Orbital;

    public static $driver = 'json'; 

    public static function schema(Blueprint $table)
    {
        $table->id();
        $table->string('name');
        $table->string('description')->nullable();
        $table->string('slug');
        $table->json('content')->nullable();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'description',
        'slug',
        'content',
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
