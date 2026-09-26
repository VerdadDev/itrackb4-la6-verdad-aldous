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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        return [
            1 => ['id' => 1, 'title' => 'Naruto', 'author' => 'Masashi Kishimoto',  'rate' => 5, 'genre' => "Action", 'chapter' => 700, 'is_complete' => true],
            2 => ['id' => 2, 'title' => 'One Piece', 'author' => 'Eiichiro Oda',        'rate' => 5, 'genre' => "Comedy", 'chapter' => 1184, 'is_complete' => false],
            3 => ['id' => 3, 'title' => 'Dragon Ball', 'author' => 'Akira Toriyama',     'rate' => 4, 'genre' => "Action", 'chapter' => 519, 'is_complete' => true],
            4 => ['id' => 4, 'title' => 'Attack on Titan', 'author' => 'Hajime Isayama',  'rate' => 4, 'genre' => "Action", 'chapter' => 139, 'is_complete' => true],
            5 => ['id' => 5, 'title' => 'Death Note', 'author' => 'Tsugumi Ohba',       'rate' => 3, 'genre' => "Mystery", 'chapter' => 108, 'is_complete' => true],
            6 => ['id' => 6, 'title' => 'Fruits Basket', 'author' => 'Natsuki Takaya', 'rate' => 2, 'genre' => 'Drama', 'chapter' => 136, 'is_complete' => true],
            7 => ['id' => 7, 'title' => 'Ouran High School Host Club', 'author' => 'Bisco Hatori', 'rate' => 4, 'genre' => 'Comedy', 'chapter' => 83, 'is_complete' => true],
            8 => ['id' => 8, 'title' => 'Kimi ni Todoke: From Me to You', 'author' => 'Karuho Shiina', 'rate' => 3, 'genre' => 'Romance', 'chapter' => 123, 'is_complete' => true],
        ];
    }

}
