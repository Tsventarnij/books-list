@extends('layouts.default')

@section('content')
  <div class="container marketing">
    <h1>Top author</h1>
    <div class="row">
      @foreach($topAuthor as $author)
        <div class="col-lg-4">
          <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"></rect><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text></svg>
          <h2>{{$author->name}}</h2>
            <p>{{$author->books_count}} books written</p>
            <p><a class="btn btn-secondary" href="{{ route('getAuthor', ['id' => $author->id]) }}">View details »</a></p>
        </div>
      @endforeach
    </div>
  </div>
@stop