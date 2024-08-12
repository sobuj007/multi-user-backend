@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Edit City</h1>
    <div class="bg-white p-6 rounded-lg shadow-md">
        <form action="{{ route('cities.update', $city->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="name" class="block text-gray-700">Name:</label>
                <input type="text" name="name" id="name" class="mt-1 block w-full" value="{{ $city->name }}" />
                @error('name') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Update City</button>
        </form>
    </div>
@endsection
