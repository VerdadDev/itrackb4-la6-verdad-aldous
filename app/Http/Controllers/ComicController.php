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
        $chapter = $request->query('chapter', 'all');

        $all = $this->comics();

        if($genre === 'all'){
            $comics = $all;
        }
        else{
            $comics = [];
            foreach($all as $id => $comic){
                if($comic['genre'] == $genre){
                    $comics[$id] = $comic;
                }
            }
        }
        if ($chapter === 'all') {
            $comics = $all;
        } else {
            $comics = [];
            foreach ($all as $id => $comic) {
                if ($comic['chapter'] == $chapter) {
                    $comics[$id] = $comic;
                }
            }
        }

        return view('comics.index', 
        ['comics' => $comics, 
        'genre' => $genre,
        'chapter' => $chapter]);
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

    public function filter($genre = null)
    {
        $comics = $this->comics();

        if ($genre === null) {
            return view('comics.filter', [
                'comics' => $comics,
                'genre' => null
            ]);
        } else {
            $filteredComics = array_filter($comics, function ($comic) use ($genre) {
                return strtolower($comic['genre']) === strtolower($genre);
            });

            return view('comics.filter', [
                'comics' => $filteredComics,
                'genre' => $genre
            ]);
        }
    }

    private function comics()
    {
        return [
            1 => ['id' => 1, 'title' => 'Naruto', 'author' => 'Masashi Kishimoto',     'genre' => "Action", 'chapter' => 700, 'is_complete' => true],
            2 => ['id' => 2, 'title' => 'One Piece', 'author' => 'Eiichiro Oda',        'genre' => "Comedy", 'chapter' => 1184, 'is_complete' => false],
            3 => ['id' => 3, 'title' => 'Dragon Ball', 'author' => 'Akira Toriyama',     'genre' => "Action", 'chapter' => 519, 'is_complete' => true],
            4 => ['id' => 4, 'title' => 'Attack on Titan', 'author' => 'Hajime Isayama',  'genre' => "Action", 'chapter' => 139, 'is_complete' => true],
            5 => ['id' => 5, 'title' => 'Death Note', 'author' => 'Tsugumi Ohba',       'genre' => "Mystery", 'chapter' => 108, 'is_complete' => true],
            6 => ['id' => 6, 'title' => 'Fruits Basket', 'author' => 'Natsuki Takaya', 'genre' => 'Drama', 'chapter' => 136, 'is_complete' => true],
            7 => ['id' => 7, 'title' => 'Ouran High School Host Club', 'author' => 'Bisco Hatori', 'genre' => 'Comedy', 'chapter' => 83, 'is_complete' => true],
            8 => ['id' => 8, 'title' => 'Kimi ni Todoke: From Me to You', 'author' => 'Karuho Shiina', 'genre' => 'Romance', 'chapter' => 123, 'is_complete' => true],
        ];
    }

}
