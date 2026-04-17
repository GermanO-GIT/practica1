<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMovieRequest;
use App\Http\Requests\UpdateMovieRequest;
use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MovieController extends Controller
{
    public function index(): View
    {
        $movies = Movie::with('genre')->latest()->paginate(10);

        return view('movies.index', compact('movies'));
    }

    public function create(): View
    {
        $genres = Genre::orderBy('genre')->get();
        $formats = ['dvd' => 'DVD', 'bluray' => 'Blu-ray', 'digital' => 'Digital'];

        return view('movies.create', compact('genres', 'formats'));
    }

    public function store(StoreMovieRequest $request): RedirectResponse
    {
        Movie::create($request->validated());

        return redirect()->route('movies.index')->with('success', 'Movie created successfully.');
    }

    public function show(Movie $movie): View
    {
        return view('movies.show', compact('movie'));
    }

    public function edit(Movie $movie): View
    {
        $genres = Genre::orderBy('genre')->get();
        $formats = ['dvd' => 'DVD', 'bluray' => 'Blu-ray', 'digital' => 'Digital'];

        return view('movies.edit', compact('movie', 'genres', 'formats'));
    }

    public function update(UpdateMovieRequest $request, Movie $movie): RedirectResponse
    {
        $movie->update($request->validated());

        return redirect()->route('movies.index')->with('success', 'Movie updated successfully.');
    }

    public function destroy(Movie $movie): RedirectResponse
    {
        $movie->delete();

        return redirect()->route('movies.index')->with('success', 'Movie deleted successfully.');
    }
}
