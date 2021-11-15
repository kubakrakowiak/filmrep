@extends('layouts.default')

@section('title', 'Movies')



@section('content')
    <div class="flex justify-center pt-20">
        <form action="/movies/{{$movie->id}}" method="POST">
            @csrf
            @method('PUT')
            <div class="block">
                <label class="block text-left" style="max-width: 300px">
                    <select class="form-multiselect block w-80 mt-1 mb-10 p-2" name="genres[]" multiple>
                        <option disabled>Genre</option>
                        @foreach($all_genres as $genre)
                            @if($genres->contains($genre))
                                <option selected value="{{$genre->id}}">{{$genre->name}}</option>
                            @else
                                <option value="{{$genre->id}}">{{$genre->name}}</option>
                            @endif
                        @endforeach
                    </select>
                </label>
                <label class="block text-left" style="max-width: 300px">
                    <select class="form-multiselect block w-80 mt-1 mb-10 p-2" name="directors[]" multiple>
                        <option disabled>Directors</option>
                        @foreach($all_directors as $director)
                            @if($directors->contains($director))
                                <option selected value="{{$director->id}}">{{$director->name}} {{$director->lastname}} </option>
                            @else
                                <option value="{{$director->id}}">{{$director->name}} {{$director->lastname}} </option>
                            @endif
                        @endforeach
                    </select>
                </label>
                <label class="block text-left" style="max-width: 300px">
                    <select class="form-multiselect block w-80 mt-1 mb-10 p-2" name="actors[]" multiple>
                        <option disabled>Actors</option>
                        @foreach($all_actors as $actor)
                            @if($actors->contains($actor))
                                <option selected value="{{$actor->id}}">{{$actor->name}} {{$actor->lastname}} </option>
                            @else
                                <option value="{{$actor->id}}">{{$actor->name}} {{$actor->lastname}} </option>
                            @endif
                        @endforeach
                    </select>
                </label>
                <input
                    type="text"
                    class="block shadow-5xl mb-10 p-2 w-80 itelic placeholder-gray-400"
                    name="name"
                    value="{{$movie->name}}">
                <input
                    type="text"
                    class="block shadow-5xl mb-10 p-2 w-80 itelic placeholder-gray-400"
                    name="place"
                    value="{{$movie->place}}">
                <input
                    type="text"
                    class="block shadow-5xl mb-10 p-2 w-80 itelic placeholder-gray-400"
                    name="premiere"
                    value="{{$movie->premiere}}">
                <textarea
                    type="text"
                    class="block shadow-5xl mb-10 p-2 w-80 h-60 itelic placeholder-gray-400"
                    name="desc">{{$movie->desc}}</textarea>
                <button type="submit" class="bg-green-500 block shadow-5xl mb-10 p-2 w-80 uppercase font-bold">
                    Submit
                </button>
            </div>
        </form>
    </div>
@endsection

