@extends('layouts.app')

@section('title')

@section('content')



    @if ($genre === 'all' && $rate === 'all')
     <p>Showing all comics</p>

    @elseif ($genre !== 'all' && $rate === 'all')
    <p>Showing comics with genre: {{ $genre }}</p>

    @elseif ($genre === 'all' && $rate !== 'all')
    <p>Showing comics with rating: {{ $rate }} stars and above</p>

    @else
    <p>Showing comics with genre: {{ $genre }} and rating: {{ $rate }} stars and above</p>
    @endif

    <nav>
    <a href="{{ route('comics.index') }}">All</a>
    <a href="{{ route('comics.index', ['genre' => 'Action', 'rate' => $rate]) }}">Action</a>
    <a href="{{ route('comics.index', ['genre' => 'Comedy', 'rate' => $rate]) }}">Comedy</a>
    <a href="{{ route('comics.index', ['genre' => 'Mystery', 'rate' => $rate]) }}">Mystery</a>
    <a href="{{ route('comics.index', ['genre' => 'Drama', 'rate' => $rate]) }}">Drama</a>
    <a href="{{ route('comics.index', ['genre' => 'Romance', 'rate' => $rate]) }}">Romance</a>
    </nav>

    <nav>
    <a href="{{ route('comics.index', ['rate' => '5', 'genre' => $genre]) }}">5</a>
    <a href="{{ route('comics.index', ['rate' => '4', 'genre' => $genre]) }}">4 & Above</a>
    <a href="{{ route('comics.index', ['rate' => '3', 'genre' => $genre]) }}">3 & Above</a>
    </nav>

    <button class="btn btn-primary mt-3"><a href="{{ route('comics.create') }}" class="text-white">Add Comics</a></button>

    <table class = "table table-striped mt-4" border="1" cellpadding="8">
        <tr>
            <th>#</th>
            <th>Title</th>
            <th>Author</th>
            <th>Rating</th>
            <th>Genre</th>
            <th>Chapters</th>
            <th>Complete</th>
        </tr>
 
        @forelse ($comics as $comic)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td><a href="{{ route('comics.show', [$comic['id']]) }}">{{ $comic['title'] }}</a></td>
                <td><a href="{{ route('comics.show', [$comic['id']]) }}">{{ $comic['author'] }}</a></td>
                <td>{{ $comic['rate'] }}</td>
                <td>{{ $comic['genre'] }}</td>
                <td>{{ $comic['chapter'] }}</td>
                <td>{{ $comic['is_complete'] ? 'Yes' : 'No' }}</td>           
            </tr>
        @empty
            <tr>
                <td colspan="5">No comics found.</td>
            </tr>
        @endforelse

@endsection
