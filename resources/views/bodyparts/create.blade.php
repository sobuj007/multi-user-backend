@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-semibold mb-4">Create Body Part</h1>
    <form action="{{ route('bodyparts.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded-lg shadow-md">
        @csrf
        <div class="mb-4">
            <label for="subcategory_id" class="block text-gray-700 text-sm font-medium mb-2">Subcategory</label>
            <select name="subcategory_id" id="subcategory_id" class="form-select block w-full mt-1 border-gray-300 rounded-md shadow-sm" required>
                <option value="">Select a subcategory</option>
                @foreach ($subcategories as $subcategory)
                    <option value="{{ $subcategory->id }}">{{ $subcategory->subcategory_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <label for="bodypart_name" class="block text-gray-700 text-sm font-medium mb-2">Name</label>
            <input type="text" name="bodypart_name" id="bodypart_name" class="form-input block w-full mt-1 border-gray-300 rounded-md shadow-sm" value="{{ old('bodypart_name') }}" required>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Save</button>
    </form>
</div>
@endsection
