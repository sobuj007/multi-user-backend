@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-semibold mb-4">Body Parts</h1>
    <a href="{{ route('bodyparts.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Add Body Part</a>
    <div class="mt-6 overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">
            <thead class="bg-gray-100 border-b border-gray-200">
                <tr>
                    <th class="px-6 py-3 text-left text-gray-500">ID</th>
                    <th class="px-6 py-3 text-left text-gray-500">Subcategory</th>
                    <th class="px-6 py-3 text-left text-gray-500">Name</th>
                    <th class="px-6 py-3 text-left text-gray-500">Image</th>
                    <th class="px-6 py-3 text-left text-gray-500">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bodyparts as $bodypart)
                <tr class="border-b border-gray-200">
                    <td class="px-6 py-4 text-gray-700">{{ $bodypart->id }}</td>
                    <td class="px-6 py-4 text-gray-700">{{ $bodypart->subcategory->subcategory_name }}</td>
                    <td class="px-6 py-4 text-gray-700">{{ $bodypart->bodypart_name }}</td>
                    <td class="px-6 py-4 text-gray-700">
                        @if($bodypart->image)
                            <img src="{{ Storage::url($bodypart->image) }}" class="w-24 h-24 object-cover rounded" alt="Body Part Image">
                        @endif
                    </td>
                    <td class="px-6 py-4 text-gray-700 flex space-x-2">
                        <a href="{{ route('bodyparts.edit', $bodypart->id) }}" class="bg-yellow-500 text-white px-2 py-1 rounded hover:bg-yellow-600">Edit</a>
                        <form action="{{ route('bodyparts.destroy', $bodypart->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
