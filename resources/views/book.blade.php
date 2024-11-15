@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $book->title }}</h1>
    <p>Szerző: {{ $book->author }}</p>
    <p>Kiadás éve: {{ $book->publication_year }}</p>

    <form action="{{ route('rentals.store') }}" method="POST">
        @csrf
        <input type="hidden" name="book_id" value="{{ $book->id }}">
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="rental_date">Kölcsönzés Dátuma:</label>
            <input type="date" class="form-control" id="rental_date" name="rental_date" required>
        </div>
        <button type="submit" class="btn btn-primary">Kölcsönzés</button>
    </form>
</div>
@endsection
