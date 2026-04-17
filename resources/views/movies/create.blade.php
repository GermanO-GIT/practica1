@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header">
                    <h2>Create Movie</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('movies.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}">
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="genre_id" class="form-label">Genre</label>
                            <select name="genre_id" id="genre_id" class="form-select @error('genre_id') is-invalid @enderror">
                                <option value="">Select genre</option>
                                @foreach($genres as $genre)
                                    <option value="{{ $genre->id }}" {{ old('genre_id') == $genre->id ? 'selected' : '' }}>{{ $genre->gender }}</option>
                                @endforeach
                            </select>
                            @error('genre_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="format" class="form-label">Format</label>
                            <select name="format" id="format" class="form-select @error('format') is-invalid @enderror">
                                <option value="">Select format</option>
                                @foreach($formats as $value => $label)
                                    <option value="{{ $value }}" {{ old('format') == $value ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @error('format')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button class="btn btn-primary">Save Movie</button>
                        <a href="{{ route('movies.index') }}" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
