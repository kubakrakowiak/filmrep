@extends('layouts.default')

@section('title', 'Movies')



@section('content')
    <div class="flex justify-center pt-20">

        <form action="/movies/{{$movie->id}}/review" method="POST" >
            @csrf
            <div class="block uppercase font-bold">Your review for: </div>
            <div class="block uppercase font-bold">{{$movie->name}}</div>
            <div class="block uppercase font-light pt-5">Rating</div>
            <div class="block">
                <div class="rating mb-10 content-center">
                    <input id="star5" name="star" type="radio" value="5" class="radio-btn hide" />
                    <label for="star5" >☆</label>
                    <input id="star4" name="star" type="radio" value="4" class="radio-btn hide" />
                    <label for="star4" >☆</label>
                    <input id="star3" name="star" type="radio" value="3" class="radio-btn hide" />
                    <label for="star3" >☆</label>
                    <input id="star2" name="star" type="radio" value="2" class="radio-btn hide" />
                    <label for="star2" >☆</label>
                    <input id="star1" name="star" type="radio" value="1" class="radio-btn hide" />
                    <label for="star1" >☆</label>
                    <div class="clear"></div>
                </div>
                @error('star')
                    <div class="error">{{ $message }}</div>
                @enderror
                <input type="text" hidden value="{{$movie->id}}" name="movie_id">
                <div class="block uppercase font-light pt-1">Review (optional)</div>
                <textarea
                    type="text"
                    class="block shadow-5xl mb-10 p-2 w-80 h-60 itelic placeholder-gray-400"
                    name="desc"
                    placeholder="Review (this field can be empty, then your rating will be counted but you wouldn't let others know what u think about this movie"></textarea>
                <button type="submit" class="bg-green-500 block shadow-5xl mb-10 p-2 w-80 uppercase font-bold">
                    Submit
                </button>
            </div>
        </form>
    </div>
@endsection

