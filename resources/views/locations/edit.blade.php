@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Edit Location</h1>
    <div class="bg-white p-6 rounded-lg shadow-md">
        <form action="{{ route('locations.update', $location->id) }}" method="POST">
            @csrf
            @method('PUT') <!-- This is necessary for updating a resource -->

            <!-- Location Name -->
            <div class="mb-4">
                <label for="name" class="block text-gray-700">Name:</label>
                <input type="text" name="name" id="name" class="mt-1 block w-full" value="{{ old('name', $location->name) }}" />
                @error('name') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <!-- City Selection -->
            <div class="mb-4">
                <label for="city_id" class="block text-gray-700">City:</label>
                <select name="city_id" id="city_id" class="mt-1 block w-full">
                    @foreach($cities as $city)
                        <option value="{{ $city->id }}" {{ $location->city_id == $city->id ? 'selected' : '' }}>
                            {{ $city->name }}
                        </option>
                    @endforeach
                </select>
                @error('city_id') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <!-- Update Button -->
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Update Location
            </button>
        </form>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(function() {
                var successMessage = document.getElementById('success-message');
                if (successMessage) {
                    successMessage.style.display = 'none';
                }
            }, 2000); // 2000 milliseconds = 2 seconds
        });
    </script>
@endsection
