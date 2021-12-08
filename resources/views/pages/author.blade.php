@extends('layouts.default')

@section('content')
    <div class="container">
        <h1>{{ $author->name }}</h1>
        <ul>
            @foreach ($books as $book)
                <li><a  href="{{ route('getBook', ['id' => $book->id]) }}">{{ $book->title }}</a></li>
            @endforeach
        </ul>
        {{ $books->links() }}
    </div>
@stop