@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4">City Details</h1>
    <div class="bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-xl font-bold">{{ $city->name }}</h2>
        <a href="{{ route('cities.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-4 inline-block">Back to List</a>
    </div>
@endsection
