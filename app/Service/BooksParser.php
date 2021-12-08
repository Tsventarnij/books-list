<?php
namespace App\Service;

use App\Models\Author;
use App\Models\Book;
use Carbon\Carbon;

class BooksParser
{
    const INCORRECT_AUTHORS_NAME = [
        'editors',
        'friends',
        'compiled'
    ];

    const SUFFIXES = [
        'Jr.',
        'Sr.',
        'Jr',
        'Sr',
        'I',
        'II',
        'III',
        'IV',
        'V',
        'VI',
        'VII',
        'VIII',
        'IIX',
        'IX',
        'X'
    ];

    public function importData($data)
    {
        foreach ($data as $item) {
            $book = new Book();
            $book->title = $item->title;
            $book->isbn = $item->isbn ?? null;
            $book->page_count = $item->pageCount;
            if (isset($item->publishedDate)) {
                $date = new Carbon($item->publishedDate->{'$date'});
                $book->published_date = $date->tz('UTC');
            }
            $book->thumbnail_url = $item->thumbnailUrl ?? null;
            $book->short_description = $item->shortDescription ?? null;
            $book->long_description = $item->longDescription ?? null;
            $book->status = $item->status ?? null;
            $book->categories = json_encode($item->categories);
            $book->save();
            $this->syncAuthors($book, $item->authors);
        }
    }

    private function syncAuthors($book, $authors)
    {
        $authors = $this->transformAuthors($authors);
        $authorIds = [];
        foreach ($authors as $name) {
            $author = Author::firstOrCreate(['name' => $name]);
            $authorIds[] = $author->id;
        }
        $book->authors()->sync($authorIds);
    }

    private function transformAuthors($authors)
    {
        $result = [];
        foreach ($authors as $author) {
            if (!empty($author)) {
                $result = array_merge($result, preg_split("/^with |^and | with | and |; /", $author, -1, PREG_SPLIT_NO_EMPTY));
            }
        }
        $previousKey = null;
        foreach ($result as $key => $name) {
            if (!is_null($previousKey) && in_array($name, self::SUFFIXES)) {
                $result[$previousKey] .= " $name";
                unset($result[$key]);
            } elseif (in_array(strtolower($name), self::INCORRECT_AUTHORS_NAME)) {
                unset($result[$key]);
            } else {
                $positionOfBy = strrpos($name, ' by ');
                if ($positionOfBy !== false) {
                    $result[$key] = substr($name, $positionOfBy + 4);
                }
                $previousKey = $key;
            }

        }
        return $result;
    }
}