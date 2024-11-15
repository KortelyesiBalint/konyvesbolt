@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Kölcsönzés alatt lévő Könyvek</h1>

    <table class="table">
        <thead>
            <tr>
                <th>Könyv címe</th>
                <th>Szerző</th>
                <th>Kölcsönző Email</th>
                <th>Kölcsönzés Dátuma</th>
                <th>Visszavitel Dátuma</th>
                <th>Akciók</th>
            </tr>
        </thead>
        <tbody>
            @foreach($rentals as $rental)
                <tr>
                    <td>{{ $rental->book->title }}</td>
                    <td>{{ $rental->book->author }}</td>
                    <td>{{ $rental->email }}</td>
                    <td>{{ $rental->rental_date }}</td>
                    <td>
                        <form action="{{ route('rentals.update', $rental->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <input type="date" name="return_date" required>
                            <button type="submit" class="btn btn-warning">Visszahozás</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
