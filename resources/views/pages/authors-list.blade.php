@extends('layouts.default')

@section('content')
    <div class="container">
        <ul>
        @foreach ($authors as $author)
            <li><a  href="{{ route('getAuthor', ['id' => $author->id]) }}">{{ $author->name }}</a></li>
        @endforeach
        </ul>
        {{ $authors->links() }}
    </div>

@stop