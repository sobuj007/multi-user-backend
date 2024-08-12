@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Add Subcategory</h1>
    <div class="bg-white p-6 rounded-lg shadow-md">
        <form action="{{ route('subcategories.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="category_id" class="block text-gray-700">Category:</label>
                <select name="category_id" id="category_id" class="mt-1 block w-full">
                    <option value="">Select Category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category_id') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <label for="subcategory_name" class="block text-gray-700">Subcategory Name:</label>
                <input type="text" name="subcategory_name" id="subcategory_name" class="mt-1 block w-full" value="{{ old('subcategory_name') }}" />
                @error('subcategory_name') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <label for="image" class="block text-gray-700">Image:</label>
                <input type="file" name="image" id="image" class="mt-1 block w-full" />
                @error('image') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add Subcategory</button>
        </form>
    </div>
@endsection
