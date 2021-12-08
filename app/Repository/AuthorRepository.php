<?php
namespace App\Repository;

use App\Models\Author;

class AuthorRepository
{
    public function getTop(int $count)
    {
        return Author::query()
            ->orderBy('books_count', 'desc')
            ->limit($count)
            ->get();
    }

    public function getAuthorWithBooks(int $id)
    {
        $author =  Author::findOrFail($id);

        return [
            'author' => $author,
            'books' => $author->books()->paginate(5)
        ];
    }
}