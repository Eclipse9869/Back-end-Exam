@extends('layouts.app')

@section('content')
    <h3 class="text-center">Book List</h3>

    <form method="GET" action="{{ url('/') }}" class="row g-3 mb-4">
        <div class="col-auto">
            <label class="form-label">List shown :</label>
            <select name="limit" class="form-select">
                @foreach (range(10, 100, 10) as $val)
                    <option value="{{ $val }}" {{ request('limit') == $val ? 'selected' : '' }}>{{ $val }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-auto">
            <label class="form-label">Search :</label>
            <input type="text" name="search" class="form-control" value="{{ request('search') }}">
        </div>
        <div class="col-auto mt-4">
            <button class="btn btn-primary">SUBMIT</button>
        </div>
    </form>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Book Name</th>
                <th>Category Name</th>
                <th>Author Name</th>
                <th>Average Rating</th>
                <th>Voter</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $i => $book)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $book->name }}</td>
                    <td>{{ $book->category->name ?? '-' }}</td>
                    <td>{{ $book->author->name }}</td>
                    <td>{{ number_format($book->ratings_avg_value, 2) }}</td>
                    <td>{{ $book->ratings_count }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $books->withQueryString()->links() }}
@endsection
