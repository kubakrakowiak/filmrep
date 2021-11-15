<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use App\Models\ActorMovie;
use App\Models\Director;
use App\Models\DirectorMovies;
use App\Models\Genre;
use App\Models\Movie;
use App\Models\MovieGenre;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies = Movie::paginate(15);
        return view('movies.index', [
            'movies' => $movies
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $genres = Genre::all();
        $directors = Director::all();
        $actors = Actor::all();
        return view('movies.create', [
            'genres' => $genres,
            'directors' => $directors,
            'actors' => $actors,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'place' => 'required',
            'premiere' => 'required|date',
            'desc' => 'required'
        ]);
        $movie = Movie::create([
            'name' => $request->input('name'),
            'place' => $request->input('place'),
            'premiere' => $request->input('premiere'),
            'desc' => $request->input('desc'),
        ]);
        Movie::findOrFail($movie->id)->genres()->sync((array) $request->input('genres'));
        Movie::findOrFail($movie->id)->directors()->sync((array) $request->input('directors'));
        Movie::findOrFail($movie->id)->actors()->sync((array) $request->input('actors'));


        return redirect('/movies');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $movies = Movie::all();
        $movie = $movies->find($id);
        $actors = $movie->actors;
        $genres = $movie->genres;
        $directors = $movie->directors;
        $reviews = Review::where('movie_id',$id)->paginate(15);
        if(Review::where('movie_id',$id)->where('user_id', Auth::user()->id)->count()){
            $button = false;
        }
        else{
            $button = true;
        }
        return view('movies.details', [
            'movie' => $movie,
            'actors' => $actors,
            'genres' => $genres,
            'directorss' => $directors,
            'reviews' => $reviews,
            'button' => $button
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $movies = Movie::all();
        $movie = $movies->find($id);
        $actors = $movie->actors;
        $genres = $movie->genres;
        $directors = $movie->directors;
        $all_genres = Genre::all();
        $all_directors = Director::all();
        $all_actors = Actor::all();
        return view('movies.edit', [
            'movie' => $movie,
            'actors' => $actors,
            'genres' => $genres,
            'directors' => $directors,
            'all_actors' => $all_actors,
            'all_genres' => $all_genres,
            'all_directors' => $all_directors,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $movie = Movie::where('id', $id)->update([
            'name' => $request->input('name'),
            'place' => $request->input('place'),
            'premiere' => $request->input('premiere'),
            'desc' => $request->input('desc'),
        ]);
        Movie::findOrFail($id)->genres()->sync((array) $request->input('genres'));
        Movie::findOrFail($id)->directors()->sync((array) $request->input('directors'));
        Movie::findOrFail($id)->actors()->sync((array) $request->input('actors'));

        return redirect('/movies');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
