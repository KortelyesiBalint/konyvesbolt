@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Új Könyv Felvitele</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @elseif(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form action="{{ route('books.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Cím:</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="form-group">
            <label for="author">Szerző:</label>
            <input type="text" class="form-control" id="author" name="author" required>
        </div>
        <div class="form-group">
            <label for="genre_id">Műfaj:</label>
            <select class="form-control" id="genre_id" name="genre_id" required>
                @foreach($genres as $genre)
                    <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="publication_year">Kiadás éve:</label>
            <input type="number" class="form-control" id="publication_year" name="publication_year" required>
        </div>
        <button type="submit" class="btn btn-primary">Könyv hozzáadása</button>
    </form>
</div>
@endsection