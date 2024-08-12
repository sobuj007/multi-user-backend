@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Edit Category</h1>
    <div class="bg-white p-6 rounded-lg shadow-md">
        <form action="{{ route('categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="name" class="block text-gray-700">Category Name:</label>
                <input type="text" name="name" id="name" class="mt-1 block w-full" value="{{ $category->name }}" />
                @error('name') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <label for="image" class="block text-gray-700">Image:</label>
                <input type="file" name="image" id="image" class="mt-1 block w-full" />
                @error('image') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Update Category</button>
        </form>
    </div>
@endsection
