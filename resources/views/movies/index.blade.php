@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Movies</h1>
        <a href="{{ route('movies.create') }}" class="btn btn-primary">Add Movie</a>
    </div>

    <div class="card">
        <div class="card-body p-0">
            <table class="table table-striped mb-0">
                <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Genre</th>
                    <th>Format</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @forelse($movies as $movie)
                    <tr>
                        <td>{{ $movie->id }}</td>
                        <td>{{ $movie->title }}</td>
                        <td>{{ $movie->genre?->genre }}</td>
                        <td>{{ ucfirst($movie->format) }}</td>
                        <td>
                            <a href="{{ route('movies.show', $movie) }}" class="btn btn-sm btn-secondary">View</a>
                            <a href="{{ route('movies.edit', $movie) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('movies.destroy', $movie) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Delete this movie?');">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">No movies found.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-3">
        {{ $movies->links() }}
    </div>
@endsection
