<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Genre;
use Illuminate\Http\Request;


class BookController extends Controller
{
    //     public function store(Request $request)
    // {
    //     $request->validate([
    //         'title' => 'required|string|max:255',
    //         'author' => 'required|string|max:255',
    //         'genre_id' => 'required|exists:genres,id',
    //         'publication_year' => 'required|integer|min:1900|max:' . date('Y'),
    //     ]);

    //     Book::create($request->all());
    //     return redirect()->route('books.index')->with('success', 'Könyv sikeresen elmentve.');
    // }


    public function create()
    {
        $genres = Genre::all();
        return view('books.create', compact('genres'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'year' => 'required|integer|between:1500,' . date("Y"),
            'genre_id' => 'required|exists:genres,id',
        ]);

        $book = new Book();
        $book->title = $request->title;
        $book->author = $request->author;
        $book->year = $request->year;
        $book->genre_id = $request->genre_id;
        $book->save();

        return redirect()->route('books.create')->with('success', 'Könyv sikeresen hozzáadva!');
    }

    public function index(Request $request)
    {
        $query = Book::query();

        if ($request->filled('title')) {
            $query->where('title', 'like', '%' . $request->title . '%');
        }

        $books = $query->get();
        return view('books.index', compact('books'));
    }

    public function show($id)
    {
        $book = Book::findOrFail($id);
        return view('books.show', compact('book'));
    }
}
