@extends('layouts.default')

@section('title', 'Filmrep')



@section('content')
    <div class="content-center">

        <div class="py-2">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        {{$actor->name}} {{$actor->dob}}
                    </div>
                </div>
            </div>
        </div>



    </div>
@endsection
