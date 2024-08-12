@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Edit Location</h1>
    <div class="bg-white p-6 rounded-lg shadow-md">
        <form action="{{ route('locations.update', $location->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="name" class="block text-gray-700">Name:</label>
                <input type="text" name="name" id="name" class="mt-1 block w-full" value="{{ $location->name }}" />
                @error('name') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <label for="city_id" class="block text-gray-700">City:</label>
                <select name="city_id" id="city_id" class="mt-1 block w-full">
                    @foreach($cities as $city)
                        <option value="{{ $city->id }}" @if($location->city_id == $city->id) selected @endif>{{ $city->name }}</option>
                    @endforeach
                </select>
                @error('city_id') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Update Location</button>
        </form>
    </div>
@endsection
