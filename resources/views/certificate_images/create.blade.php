@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-6">{{ isset($certificateImage) ? 'Edit' : 'Add' }} Certificate</h1>

    <form action="{{ isset($certificateImage) ? route('certificate_images.update', $certificateImage->id) : route('certificate_images.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @if(isset($certificateImage))
            @method('PATCH')
        @endif

        <div class="mb-4">
            <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
            <input type="text" name="title" value="{{ $certificateImage->title ?? old('title') }}" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
        </div>

        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
            <textarea name="description" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>{{ $certificateImage->description ?? old('description') }}</textarea>
        </div>

        <div class="mb-4">
            <label for="images" class="block text-sm font-medium text-gray-700">Images</label>
            <input type="file" name="images[]" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" multiple>
        </div>

        <div>
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                {{ isset($certificateImage) ? 'Update' : 'Add' }} Certificate
            </button>
        </div>
    </form>
</div>
@endsection
