@extends('layouts.default')

@section('content')
    <div class="container">
        <div class="row g-0  overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
            <div class="col p-4 d-flex flex-column position-static">
                <h3 class="mb-0">{{$book->title}}</h3>
                <strong class="d-inline-block mb-2 text-primary">
                    @foreach($book->authors as $author)
                        <a href="{{ route('getAuthor', ['id' => $author->id]) }}">{{ $author->name }}</a>
                        @if(!$loop->last)
                            ,
                        @endif
                    @endforeach
                </strong>
                <div class="mb-1 text-muted">Page count - {{$book->page_count}}</div>
                <div class="mb-1 text-muted">Status - {{strtolower($book->status)}}</div>
                @if ($book->published_date)
                    <div class="mb-1 text-muted">Published date - {{$book->published_date}}</div>
                @endif
                @if ($categories = json_decode($book->categories))
                    <div class="mb-1 text-muted">Categories - {{implode(', ', $categories)}}</div>
                @endif
                <p class="card-text mb-auto">{{$book->short_description}}</p>
                <p class="card-text mb-auto">{{$book->long_description}}</p>
            </div>
            <div class="col-auto d-none d-lg-block">
                @if($book->thumbnail_url)
                    <img src="{{$book->thumbnail_url}}" width="200" height="250" />
                @else
                    <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
                @endif
            </div>
        </div>
    </div>
@stop