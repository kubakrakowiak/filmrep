@extends('layouts.default')

@section('title', 'Movies')



@section('content')
    <div class="flex justify-center pt-20">
        <form action="/directors" method="POST">
            @csrf
            <div class="block">
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
                    name="lastname"
                    placeholder="Lastname">
                @error('lastname')
                    <div class="error">{{ $message }}</div>
                @enderror
                <input
                    type="text"
                    class="block shadow-5xl mb-10 p-2 w-80 itelic placeholder-gray-400"
                    name="origin"
                    placeholder="Origin">
                @error('origin')
                    <div class="error">{{ $message }}</div>
                @enderror
                <input
                    type="text"
                    class="block shadow-5xl mb-10 p-2 w-80 itelic placeholder-gray-400"
                    name="dob"
                    placeholder="DOB YYYY-DD-MM">
                @error('dob')
                    <div class="error">{{ $message }}</div>
                @enderror
                <button type="submit" class="bg-green-500 block shadow-5xl mb-10 p-2 w-80 uppercase font-bold">
                    Submit
                </button>
            </div>
        </form>
    </div>
@endsection

