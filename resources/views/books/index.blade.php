@extends('layouts.app')

@section('content')
    <h1>Available Books</h1>

    @if(session('success'))
        <div>{{ session('success') }}</div>
    @endif

    <form action="{{ route('books.index') }}" method="GET">
        <input type="text" name="search" placeholder="Search by title">
        <button type="submit">Search</button>
    </form>

    <ul>
        @foreach($books as $book)
            <li>
                {{ $book->title }} by {{ $book->author }} ({{ $book->published_year }})
                <a href="{{ route('books.show', $book) }}">Details</a>
                <form action="{{ route('books.destroy', $book) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
