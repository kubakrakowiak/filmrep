<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewsController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $movie = Movie::find($id);

        return view('reviews.create', [
            'movie' => $movie
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
        $movie = Movie::find($request->input('movie_id'));
        $check_reviews = $movie->reviews->where('user_id', Auth::user()->id)->where('movie_id', $movie->id)->count();
        $request->validate([
            'star' => 'required|integer',
        ]);
        if(!$check_reviews){
            if($request->input('desc'))
            {
                $review = Review::create([
                    'globes' => $request->input('star'),
                    'text_review' => $request->input('desc'),
                    'movie_id' => $request->input('movie_id'),
                    'user_id' => Auth::user()->id,
                ]);
            }
            else{
                $review = Review::create([
                    'globes' => $request->input('star'),
                    'movie_id' => $request->input('movie_id'),
                    'user_id' => Auth::user()->id,
                ]);
            }
        }
        return redirect('/movies/'.strval($movie->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
