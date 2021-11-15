@extends('layouts.default')

@section('title', 'Movies')



@section('content')
    <div class="flex justify-center pt-20">
        <form action="/movies" method="POST">
            @csrf
            <div class="block">
                <label class="block text-left" style="max-width: 300px">
                    <select class="form-multiselect block w-80 mt-1 mb-10 p-2" name="genres[]" multiple>
                        <option disabled>Genre</option>
                        @foreach($genres as $genre)
                            <option value="{{$genre->id}}">{{$genre->name}}</option>
                        @endforeach
                    </select>
                </label>
                <label class="block text-left" style="max-width: 300px">
                    <select class="form-multiselect block w-80 mt-1 mb-10 p-2" name="directors[]" multiple>
                        <option disabled>Directors</option>
                        @foreach($directors as $director)
                            <option value="{{$director->id}}">{{$director->name}} {{$director->lastname}} </option>
                        @endforeach
                    </select>
                </label>
                <label class="block text-left" style="max-width: 300px">
                    <select class="form-multiselect block w-80 mt-1 mb-10 p-2" name="actors[]" multiple>
                        <option disabled>Actors</option>
                        @foreach($actors as $actor)
                            <option value="{{$actor->id}}">{{$actor->name}} {{$actor->lastname}} </option>
                        @endforeach
                    </select>
                </label>
                <input
                    type="text"
                    class="block shadow-5xl mb-10 p-2 w-80 itelic placeholder-gray-400"
                    name="name"
                    placeholder="Name">
                @error('name')
                    <div class="error">{{ $message }}</div>
                @enderror
                <input
                    type="text"
                    class="block shadow-5xl mb-10 p-2 w-80 itelic placeholder-gray-400"
                    name="place"
                    placeholder="Origin">
                @error('place')
                    <div class="error">{{ $message }}</div>
                @enderror
                <input
                    type="text"
                    class="block shadow-5xl mb-10 p-2 w-80 itelic placeholder-gray-400"
                    name="premiere"
                    placeholder="DOB YYYY-DD-MM">
                @error('premiere')
                    <div class="error">{{ $message }}</div>
                @enderror
                <textarea
                    type="text"
                    class="block shadow-5xl mb-10 p-2 w-80 h-60 itelic placeholder-gray-400"
                    name="desc">Desc</textarea>
                @error('desc')
                    <div class="error">{{ $message }}</div>
                @enderror
                <button type="submit" class="bg-green-500 block shadow-5xl mb-10 p-2 w-80 uppercase font-bold">
                    Submit
                </button>
            </div>
        </form>
    </div>
@endsection

