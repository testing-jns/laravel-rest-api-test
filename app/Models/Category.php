<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public static function all($columns = null) : Collection {
        return static::with('posts')->get();
    }

    public function posts() : HasMany {
        return $this->hasMany(Post::class)->whereNotNull('published_at');
    }
}
