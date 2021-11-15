@extends('layouts.default')

@section('title', 'Movies')



@section('content')
    <div class="content-center">
        <a href="{{route('directors.create')}}">
            <button class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow ml-28 my-3">
                Add a new one
            </button>
        </a>
        @foreach($directors as $director)
            <div class="py-2">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <a href="{{route('directors.show', ['director' => $director->id])}}">
                                {{$director->name}} {{$director->lastname}}
                            </a>
                            <div class="text-right">Starred in productions: {{$director->movies->count()}}</div>
                        </div>
                    </div>
                </div>
            </div>

        @endforeach
        <div class="max-w-3xl">
            {{ $directors->links() }}
        </div>

    </div>
@endsection
