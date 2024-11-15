extends('layouts.app')

@section('content')
<div class="container">
    <h1>Kölcsönözhető Könyvek</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @elseif(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    
    <form method="GET" class="mb-3">
        <input type="text" name="search" placeholder="Könyv cím keresése" class="form-control" value="{{ request()->search }}">
        <button type="submit" class="btn btn-primary mt-2">Keresés</button>
    </form>

    <table class="table">
        <thead>
            <tr>
                <th>Szerző</th>
                <th>Cím</th>
                <th>Kiadás éve</th>
                <th>Akciók</th>
            </tr>
        </thead>
        <tbody>
            @foreach($books as $book)
                <tr>
                    <td>{{ $book->author }}</td>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->publication_year }}</td>
                    <td>
                        <a href="{{ route('books.rent', $book->id) }}" class="btn btn-success">Kölcsönzés</a>
                        <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Törlés</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection