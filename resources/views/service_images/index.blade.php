@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-6">Service Images</h1>

    @if(session('success'))
    <div id="success-message" class="bg-green-500 text-white p-2 mb-4">
        {{ session('success') }}
    </div>
    @endif

    <a href="{{ route('service_images.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add Service Image</a>

    <table class="min-w-full bg-white mt-4">
        <thead>
            <tr>
                <th class="py-2">ID</th>
                <th class="py-2">Title</th>
                <th class="py-2">Description</th>
                <th class="py-2">Images</th>
                <th class="py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($serviceImages as $serviceImage)
            <tr>
                <td class="py-2">{{ $serviceImage->id }}</td>
                <td class="py-2">{{ $serviceImage->title }}</td>
                <td class="py-2">{{ $serviceImage->description }}</td>
                <td class="py-2">
                    @foreach($serviceImage->files as $file)
                        <img src="{{ asset('storage/' . $file->path) }}" alt="{{ $serviceImage->title }}" width="100">
                    @endforeach
                </td>
                <td class="py-2">
                    <a href="{{ route('service_images.edit', $serviceImage->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-2 rounded">Edit</a>
                    <form action="{{ route('service_images.destroy', $serviceImage->id) }}" method="POST" class="inline">
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        setTimeout(function() {
            $('#success-message').fadeOut('slow');
        }, 2000);
    });
</script>
@endsection
