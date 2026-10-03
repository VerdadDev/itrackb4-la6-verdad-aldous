<?php

use App\Http\Controllers\ComicController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/comics/filter/{genre?}', function ($genre = null) {
    return redirect()->route('comics.index', ['genre' => $genre ?? 'all']);
})->name('comics.filter');

Route::resource('comics', ComicController::class)->only('index', 'show', 'create', 'store');



