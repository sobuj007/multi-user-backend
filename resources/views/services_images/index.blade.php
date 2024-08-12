@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-6">Service Images</h1>

    <a href="{{ route('services_images.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add Service Image</a>

    @if(session('success'))
        <div class="bg-green-500 text-white p-2 mt-4">
            {{ session('success') }}
        </div>
    @endif

    <table class="min-w-full bg-white mt-4 border border-gray-300">
        <thead>
            <tr>
                <th class="py-2 px-4 border-b">ID</th>
                <th class="py-2 px-4 border-b">Title</th>
                <th class="py-2 px-4 border-b">Description</th>
                <th class="py-2 px-4 border-b">Images</th>
                <th class="py-2 px-4 border-b">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($servicesImages as $servicesImage)
                <tr>
                    <td class="py-2 px-4 border-b">{{ $servicesImage->id }}</td>
                    <td class="py-2 px-4 border-b">{{ $servicesImage->title }}</td>
                    <td class="py-2 px-4 border-b">{{ $servicesImage->description }}</td>
                    <td class="py-2 px-4 border-b">
                        @foreach($servicesImage->files as $file)
                        <img src="{{ asset('storage/' . $file->path) }}" alt="{{ $servicesImage->title }}" class="w-32 h-32 object-cover rounded">
                    @endforeach
                    </td>
                    <td class="py-2 px-4 border-b">
                        <a href="{{ route('services_images.edit', $servicesImage->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-2 rounded">Edit</a>
                        <form action="{{ route('services_images.destroy', $servicesImage->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
