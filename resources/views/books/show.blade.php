@extends('layouts.app')

@section('content')
    <h1>{{ $book->title }} Details</h1>
    <p>Author: {{ $book->author }}</p>
    <p>Published Year: {{ $book->published_year }}</p>

    <h2>Borrow this book</h2>

    <form action="{{ route('rentals.store', $book) }}" method="POST">
        @csrf
        <input type="email" name="email" placeholder="Your Email" required>
        <input type="date" name="rental_date" required>
        <button type="submit">Rent</button>
    </form>
@endsection
