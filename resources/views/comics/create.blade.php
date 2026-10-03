@extends('layouts.app')

@section('title', 'Add Comics')

@section('content')

    <div class="card">
        <div class="card-body">
            <h3 class="card-title">
                Add Comics
            </h3>
        </div>
    </div>

    <form method="POST" action="{{ route('comics.store') }}">
        @csrf
        <div class="mb-3">
            <label class="form-label" for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>
            @error('title')
                <div class="invalid-feedback d-block">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label" for="author">Author</label>
            <input type="text" class="form-control" id="author" name="author" value="{{ old('author') }}" required>
            @error('author')
                <div class="invalid-feedback d-block">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label" for="genre">Genre</label>
            <select class="form-control" id="genre" name="genre" required>
                <option value="Action" @selected(old('genre') == 'Action')>Action</option>
                <option value="Comedy" @selected(old('genre') == 'Comedy')>Comedy</option>
                <option value="Mystery" @selected(old('genre') == 'Mystery')>Mystery</option>
                <option value="Drama" @selected(old('genre') == 'Drama')>Drama</option>
                <option value="Romance" @selected(old('genre') == 'Romance')>Romance</option>
            </select>
            @error('genre')
                <div class="invalid-feedback d-block">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label" for="rate">Rate</label>
            <select class="form-control" id="rate" name="rate" required>
                <option value="">Input your rating</option>
                <option value="1" @selected(old('rate') == '1')>1</option>
                <option value="2" @selected(old('rate') == '2')>2</option>
                <option value="3" @selected(old('rate') == '3')>3</option>
                <option value="4" @selected(old('rate') == '4')>4</option>
                <option value="5" @selected(old('rate') == '5')>5</option>
            </select>
            @error('rate')
                <div class="invalid-feedback d-block">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label" for="chapter">Chapter</label>
            <input type="number" class="form-control" id="chapter" name="chapter" required value="{{ old('chapter') }}">
            @error('chapter')
                <div class="invalid-feedback d-block">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label" for="is_complete">Complete</label>
            <select name="is_complete" class="form-control" id="is_complete" required>
                <option value="">Select Status</option>
                <option value="true" @selected(old('is_complete') == 'true')>Yes</option>
                <option value="false" @selected(old('is_complete') == 'false')>No</option>
            </select>
            @error('is_complete')
                <div class="invalid-feedback d-block">
                    {{$message}}
                </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary" "style=transform: rotate (-)">Add Comics</button>
        <a href="{{ route('comics.index') }}" class="btn btn-secondary">Cancel</a>
    </form>

@endsection