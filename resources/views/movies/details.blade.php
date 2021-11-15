@extends('layouts.default')

@section('title', 'Movies')



@section('content')
    <div class="content-center">

        <div class="py-2">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        {{$movie->name}} {{$movie->place}}
                    </div>
                </div>

            </div>
        </div>


        <div class="py-2">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        Reviews
                        @if(Auth::user() and $button)
                            <a href="{{route('review.create', $movie->id)}}">
                                <button class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-1 px-2 border border-gray-400 rounded shadow ml-28 my-3">
                                    Share review
                                </button>
                            </a>
                        @endif
                        @foreach($reviews as $review)
                            @if($review->text_review)
                                <div class="pt-5">
                                    {{$review->text_review}}
                                </div>
                            @endif
                        @endforeach
                        {{ $reviews->links() }}
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection
