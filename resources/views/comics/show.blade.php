@extends('layouts.app')

@section('title')

@section('content')

    <div class="card p-4 m-4">
        <h4>Comic: {{ $comic['title'] }}</h4>
        <p><strong>Author:</strong> {{ $comic['author'] }}</p>
        <p><strong>Genre:</strong> {{ $comic['genre'] }}</p>
        <p><strong>Rating:</strong> {{ $comic['rate'] }}</p>
        <p><strong>Chapters:</strong> {{ $comic['chapter'] }}</p>
        <p><strong>Complete:</strong> {{ $comic['is_complete'] ? 'Yes' : 'No' }}</p>
    </div>

    <button class="btn btn-secondary"><a href="{{ route('comics.index') }}" class="text-decoration-none text-white">Back</a></button>

@endsection