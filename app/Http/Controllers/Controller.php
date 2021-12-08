<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Repository\AuthorRepository;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
        $authorRepo = new AuthorRepository();
        $data = $authorRepo->getTop(3);
        return view('index', ['topAuthor' => $data]);
    }

    public function authorsList()
    {
        return view('pages.authors-list', [
            'authors' => Author::paginate(15)
        ]);
    }


    public function booksList()
    {
        return view('pages.books-list', [
            'books' => Book::paginate(15)
        ]);
    }

    public function getAuthor($id)
    {
        $authorRepo = new AuthorRepository();
        $data = $authorRepo->getAuthorWithBooks($id);
        return view('pages.author', $data);
    }

    public function getBook($id)
    {
        return view('pages.book', ['book' => Book::findOrFail($id)]);
    }
}
