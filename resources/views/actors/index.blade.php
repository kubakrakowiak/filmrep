@extends('layouts.default')

@section('title', 'Movies')



@section('content')

    <div class="content-center">
        <a href="{{route('actors.create')}}">
            <button class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow ml-28 my-3">
                Add a new one
            </button>
        </a>
        @foreach($actors as $actor)
            <div class="py-2">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg ">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <a href="{{route('actors.show', ['actor' => $actor->id])}}">
                                {{$actor->name}} {{$actor->lastname}}
                            </a>
                            <div class="text-right">Starred in productions: {{$actor->movies->count()}}</div>
                        </div>
                    </div>
                </div>
            </div>

    @endforeach
        <div class="max-w-3xl">
            {{ $actors->links() }}
        </div>

    </div>
@endsection
