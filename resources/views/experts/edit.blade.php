@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-6">Edit Expert</h1>

    <form action="{{ route('experts.update', $expert->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PATCH')

        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
            <input type="text" name="name" value="{{ $expert->name }}" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
        </div>

        <div class="mb-4">
            <label for="gender" class="block text-sm font-medium text-gray-700">Gender</label>
            <select name="gender" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                <option value="male" {{ $expert->gender == 'male' ? 'selected' : '' }}>Male</option>
                <option value="female" {{ $expert->gender == 'female' ? 'selected' : '' }}>Female</option>
                <option value="other" {{ $expert->gender == 'other' ? 'selected' : '' }}>Other</option>
            </select>
        </div>

        <div class="mb-4">
            <label for="image" class="block text-sm font-medium text-gray-700">Profile Image</label>
            <input type="file" name="image" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            @if($expert->image)
                <img src="{{ asset('storage/' . $expert->image) }}" class="mt-2 w-32 h-32 object-cover rounded">
            @endif
        </div>

        <div class="mb-4">
            <label for="expertise" class="block text-sm font-medium text-gray-700">Expertise</label>
            <input type="text" name="expertise" value="{{ $expert->expertise }}" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
        </div>

        <div class="mb-4">
            <label for="certificate_name" class="block text-sm font-medium text-gray-700">Certificate Name</label>
            <input type="text" name="certificate_name" value="{{ $expert->certificate_name }}" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
        </div>

        <div class="mb-4">
            <label for="certificate_images" class="block text-sm font-medium text-gray-700">Upload Certificate Images (optional)</label>
            <input type="file" name="certificate_images[]" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" multiple>
            @if($expert->certificate_images)
                @foreach(json_decode($expert->certificate_images, true) as $image)
                    <img src="{{ asset('storage/' . $image) }}" class="mt-2 w-32 h-32 object-cover rounded">
                @endforeach
            @endif
        </div>

        <div class="mb-4">
            <label for="experience_year" class="block text-sm font-medium text-gray-700">Experience Year</label>
            <input type="number" name="experience_year" value="{{ $expert->experience_year }}" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
        </div>

        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Update Expert
        </button>
    </form>
</div>
@endsection
