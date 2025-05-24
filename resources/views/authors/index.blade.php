@extends('layouts.app')

@section('content')
    <h3 class="text-center">Top 10 Most Famous Author</h3>

    <table class="table table-bordered mt-4">
        <thead>
            <tr>
                <th>No</th>
                <th>Author Name</th>
                <th>Voter</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($authors as $i => $author)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $author['name'] }}</td>
                    <td>{{ $author['voters'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
