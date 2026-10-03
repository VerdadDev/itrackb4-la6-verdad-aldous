<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(Request $request)
    {
        $genre = $request->query('genre', 'all');
        $rate = $request->query('rate', 'all');

        $all = $this->comics();

        if ($genre === 'all') {
            $comics = $all;
        } else {
            $comics = [];

            foreach ($all as $id => $comic) {
                if ($comic['genre'] == $genre) {
                    $comics[$id] = $comic;
                }
            }
        }

        if ($rate === 'all') {
            $comics = $comics;
        } else {
            $filtered_comics = [];

            foreach ($comics as $id => $comic) {
                if ($comic['rate'] >= $rate) {
                    $filtered_comics[$id] = $comic;
                }
            }

            $comics = $filtered_comics;
        }

        return view(
            'comics.index',
            [
                'comics' => $comics,
                'genre' => $genre,
                'rate' => $rate
            ]
        );
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('comics.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'genre' => 'required|in:Action,Comedy,Drama,Fantasy,Horror,Mystery,Romance',
            'rate' => 'required|numeric|min:1|max:5',
            'chapter' => 'required|numeric|min:1|max:2000',
            'is_complete' => 'required|in:true,false'
        ]);
        
        $comics = $this->comics();
        $id =max(array_keys($comics)) + 1;

        $comics[$id] = [
            'id' => $id,
            'title' => $validated['title'],
            'author' => $validated['author'],
            'genre' => $validated['genre'],
            'rate' => $validated['rate'],
            'chapter' => $validated['chapter'],
            'is_complete' => $validated['is_complete']
        ];

        $this->saveComics($comics);

        return redirect()->route('comics.index')->with('success', 'Comic added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $comics = $this->comics();

        if (!isset($comics[$id])) {
            abort(404);
        }

        return view('comics.show', ['comic' => $comics[$id]]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function filter($value)
    {
        return redirect()->route('comics.index', [
            'genre' => $value
        ]);
    }

    private function comics()
    {
        $path = storage_path('app/comics.json');

        return json_decode(file_get_contents($path), true);
    }

    private function saveComics($comics)
    {
        file_put_contents(
            storage_path('app/comics.json'),
            json_encode($comics, JSON_PRETTY_PRINT)
        );
    }

}
