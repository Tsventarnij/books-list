@extends('layouts.default')

@section('content')
    <div class="container">
        <ul>
        @foreach ($books as $book)
            <li><a  href="{{ route('getBook', ['id' => $book->id]) }}">{{ $book->title }}</a></li>
        @endforeach
        </ul>
        {{ $books->links() }}
    </div>

@stop