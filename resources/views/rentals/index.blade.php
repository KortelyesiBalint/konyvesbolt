@extends('layouts.app')

@section('content')
    <h1>Current Rentals</h1>

    <ul>
        @foreach($rentals as $rental)
            <li>
                {{ $rental->book->title }} by {{ $rental->book->author }}
                <p>Rented by: {{ $rental->email }} on {{ $rental->rental_date }}</p>
                <form action="{{ route('rentals.return', $rental) }}" method="POST">
                    @csrf
                    <input type="date" name="return_date" required>
                    <button type="submit">Return</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
