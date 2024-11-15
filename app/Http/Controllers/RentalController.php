<?php

namespace App\Http\Controllers;

use App\Models\Rental;
use App\Models\Book;
use Illuminate\Http\Request;

class RentalController extends Controller
{
    public function create($bookId)
    {
        $book = Book::findOrFail($bookId);
        return view('rentals.create', compact('book'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'rental_date' => 'required|date|after_or_equal:today',
        ]);

        $rental = new Rental();
        $rental->book_id = $request->book_id;
        $rental->email = $request->email;
        $rental->rental_date = $request->rental_date;
        $rental->save();

        return redirect()->route('books.index')->with('success', 'Kölcsönzés sikeresen rögzítve!');
    }

    public function index()
    {
        $rentals = Rental::with('book')->whereNull('returned_at')->get();
        return view('rentals.index', compact('rentals'));
    }

    public function returnBook(Request $request, $id)
    {
        $rental = Rental::findOrFail($id);
        $request->validate([
            'return_date' => 'required|date|after_or_equal:' . $rental->rental_date,
        ]);

        $rental->returned_at = $request->return_date;
        $rental->save();

        return redirect()->route('rentals.index')->with('success', 'A könyv visszakerült a könyvtárba!');
    }
}
