@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h2>Movie Details</h2>
                    <a href="{{ route('movies.index') }}" class="btn btn-secondary btn-sm">Back</a>
                </div>
                <div class="card-body">
                    <dl class="row">
                        <dt class="col-sm-4">Title</dt>
                        <dd class="col-sm-8">{{ $movie->title }}</dd>

                        <dt class="col-sm-4">Genre</dt>
                        <dd class="col-sm-8">{{ $movie->genre?->genre }}</dd>

                        <dt class="col-sm-4">Format</dt>
                        <dd class="col-sm-8">{{ ucfirst($movie->format) }}</dd>

                        <dt class="col-sm-4">Created At</dt>
                        <dd class="col-sm-8">{{ $movie->created_at->format('Y-m-d H:i') }}</dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>
@endsection
