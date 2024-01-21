<?php

namespace App\Models;

use Illuminate\Pagination\Paginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Author extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    
    public function posts() : HasMany {
        return $this->hasMany(Post::class);
        // return $this->hasMany(Post::class)->whereNotNull('published_at');
    }

    /**
     * Paginate from a instance
     *
     * @param array|object|Collection   $items
     * @param int   $perPage
     * @param int   $page
     * @param array $options
     *
     * @return LengthAwarePaginator
     * 
     * @source https://stackoverflow.com/questions/56768921/how-to-paginate-collection-without-keys-laravel
     */

    public static function paginate(Collection $items, int $perPage = 3, ?int $page = null, array $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);

        $items = $items instanceof Collection ? $items : Collection::make($items);

        return new LengthAwarePaginator(array_values($items->forPage($page, $perPage)
            ->toArray()), $items->count(), $perPage, $page, $options);
    }



    /**
     * Paginate from a instance
     * But the keys always follow
     * Like 
     * data [
     *  0 => [
     *   'name' => 'J'
     *  ]
     * ]
     *
     * @param array|object|Collection   $items
     * @param int   $perPage
     * @param int   $page
     * @param array $options
     *
     * @return LengthAwarePaginator
     * 
     * @source https://gist.github.com/vluzrmos/3ce756322702331fdf2bf414fea27bcb
     * 
     */
    // public static function paginate($items, $perPage = 3, $page = null, $options = [])
    // {
    //     $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);

    //     $items = $items instanceof Collection ? $items : Collection::make($items);

    //     return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    // }
}
