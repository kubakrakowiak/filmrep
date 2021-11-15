@extends('layouts.default')

@section('title', 'Movies')



@section('content')
    <div class="content-center">
        @if( Auth::user() )
            @if(Auth::user()->permission_lvl > 0)
            <a href="{{route('movies.create')}}">
                <button class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow ml-28 my-3">
                    Add a new one
                </button>
            </a>
            @endif
        @endif
        @foreach($movies as $movie)
            <div class="py-2">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <a href="{{route('movies.show', ['movie' => $movie->id])}}">
                                {{$movie->name}}
                            </a>
                            <div class="text-right">Avg: @if($movie->reviews->count() > 0) {{$movie->reviews->avg('globes')}} @else 0.0 @endif</div>
                        </div>
                    </div>
                </div>
            </div>

        @endforeach
        <div class="max-w-3xl">
            {{ $movies->links() }}
        </div>

    </div>
@endsection
