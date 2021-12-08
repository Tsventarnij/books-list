<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class AuthorBook extends Pivot
{
    protected static function booted()
    {
        static::created(function ($pivot) {
            $pivot->author()->increment('books_count');
        });

        static::deleted(function ($pivot) {
            $pivot->author()->decrement('books_count');
        });
    }

    public function author()
    {
        return $this->belongsTo(Author::class);
    }
}