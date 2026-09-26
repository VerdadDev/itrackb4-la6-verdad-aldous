@extends('layouts.app')

@section('title')

@section('content')
    
    @if ($genre === null)
    <h4 class="mt-4">Genre: All</h4>
    @else
    <h4 class="mt-4">Genre: {{ $genre }}</h4>
    @endif

    <table class = "table table-striped mt-4" border="1" cellpadding="8">
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Author</th>
                <th>Rating</th>
                <th>Genre</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($comics as $comic)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $comic['title'] }}</td>
                    <td>{{ $comic['author'] }}</td>
                    <td>{{ $comic['rate'] }}</td>
                    <td>{{ $comic['genre'] }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="3">No comics found for this genre.</td>
                </tr>
            @endforelse
       </tbody>
    </table>

<button class="btn btn-secondary"><a href="{{ route('comics.index') }}" class="text-decoration-none text-white">Back</a></button>

@endsection
