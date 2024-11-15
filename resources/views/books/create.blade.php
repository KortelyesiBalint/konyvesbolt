@extends('layouts.app')

@section('content')
    <h1>Add New Book</h1>

    <form action="{{ route('books.store') }}" method="POST">
        @csrf
        <input type="text" name="title" placeholder="Title" required>
        <input type="text" name="author" placeholder="Author" required>
        <select name="genre_id" required>
            @foreach($genres as $genre)
                <option value="{{ $genre->id }}">{{ $genre->name }}</option>
            @endforeach
        </select>
        <input type="number" name="published_year" placeholder="Published Year" required>
        <button type="submit">Add Book</button>
    </form>
@endsection
