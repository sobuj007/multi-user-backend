@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-6">Edit Service Image</h1>

    <form action="{{ route('service_images.update', $serviceImage->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PATCH')

        <div class="mb-4">
            <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
            <input type="text" name="title" value="{{ $serviceImage->title }}" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
        </div>

        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
            <textarea name="description" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>{{ $serviceImage->description }}</textarea>
        </div>

        <div class="mb-4">
            <label for="images" class="block text-sm font-medium text-gray-700">Upload New Images (optional)</label>
            <input type="file" name="images[]" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" multiple>
        </div>

        @if($serviceImage->files->count() > 0)
        <div class="mt-4">
            <h3 class="text-lg font-medium mb-2">Existing Images</h3>
            <div class="grid grid-cols-3 gap-4">
                @foreach($serviceImage->files as $file)
                    <div class="relative">
                        <img src="{{ asset('storage/' . $file->path) }}" alt="{{ $serviceImage->title }}" class="w-full h-32 object-cover rounded-md shadow-sm">
                        <form action="{{ route('service_image_files.destroy', $file->id) }}" method="POST" class="absolute top-0 right-0">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-800 text-sm">Remove</button>
                        </form>
                    </div>
                @endforeach
            </div>
        </div>
        @endif

        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Update Service Image</button>
    </form>
</div>
@endsection
