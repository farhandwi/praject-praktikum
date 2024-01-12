<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Illuminate\Support\Facades\Storage;

class MovieController extends Controller
{
    //Get all Movies
    public function index(Request $request)
    {
        return view('movies.index', [
            'movies' => Movie::latest()
                            ->filter($request->query())
                            ->simplePaginate(12)
        ]);
    }

    //Get single movie
    public function show(Movie $movie)
    {
        return view('movies.show', [
            'movie' => $movie
        ]);

    }

    //Show form for adding new movie
    public function create()
    {
        return view('movies.create', [
            'genres' => Genre::all()
        ]);
    }

    //Save new movie
    public function store(Request $request)
    {
        $validReq = $request->validate([
            'poster_path' => ['mimes:jpeg,png,bmp,tiff', 'max:4096'],
            'title' => 'required',
            'genres' => 'required',
            'studio' => 'required',
            'hours' => ['required', 'numeric', 'min:0', 'max:23'],
            'minutes' => ['required', 'numeric', 'min:0', 'max:59'],
            'director' => 'required',
            'actor' => 'required',
            'description' => 'required',
            'released_date' => ['required', 'before_or_equal:'. date("F j, Y")],
        ]);
        $data = $validReq;

        if($request->hasFile('poster_path')) {
            $data['poster_path'] = FacadesRequest::file('poster_path')->store('poster', 'public');
        }

        $data['runtime'] = $validReq['hours'] . ':' . $validReq['minutes'];
        $data['genres'] = implode(',', $validReq['genres']);
        unset($data['hours']);
        unset($data['minutes']);
        Movie::create($data);
        return redirect()->route('movies.index')->with('message', 'Movie saved successfully!');
    }

    //Show form for editing movie
    public function edit(Movie $movie) {
        return view('movies.edit', [
            'genres' => Genre::all(),
            'movie' => $movie
        ]);
    }

    //Update edited movie
    public function update(Request $request, Movie $movie) {
        $validReq = $request->validate([
            'poster_path' => ['mimes:jpeg,png,bmp,tiff', 'max:4096'],
            'title' => 'required',
            'genres' => 'required',
            'studio' => 'required',
            'hours' => ['required', 'numeric', 'min:0', 'max:23'],
            'minutes' => ['required', 'numeric', 'min:0', 'max:59'],
            'director' => 'required',
            'actor' => 'required',
            'description' => 'required',
            'released_date' => ['required', 'before_or_equal:'. date("F j, Y")],
        ]);
        $data = $validReq;

        if($request->hasFile('poster_path')) {
            $data['poster_path'] = FacadesRequest::file('poster_path')->store('poster', 'public');
        } else{
            $data['poster_path'] = $movie->poster_path;

        }

        $data['runtime'] = $validReq['hours'] . ':' . $validReq['minutes'];
        $data['genres'] = implode(',', $validReq['genres']);
        unset($data['hours']);
        unset($data['minutes']);
        $movie->update($data);
        return redirect()->route('movies.index')->with('message', 'Movie updated successfully!');
    }

    //Delete movie
    public function destroy(Movie $movie) {
        if($movie->poster_path) {
            Storage::disk('public')->delete($movie->poster_path);
        }
        $movie->delete();
        return redirect()->route('movies.index')->with('message', 'Movie removed!');
    }
}
