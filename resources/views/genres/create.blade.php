@extends('layouts.app')

@section('content')
    <h1>Add New Genre</h1>

    <form action="{{ route('genres.store') }}" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Genre Name" required>
        <button type="submit">Add Genre</button>
    </form>
@endsection