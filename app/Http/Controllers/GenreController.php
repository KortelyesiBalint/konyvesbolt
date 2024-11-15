<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function create()
    {
        return view('genres.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $genre = new Genre();
        $genre->name = $request->name;
        $genre->save();

        return redirect()->route('genres.create')->with('success', 'Műfaj sikeresen hozzáadva!');
    }
}
