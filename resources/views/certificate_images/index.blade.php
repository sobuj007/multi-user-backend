@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Certificate Images</h1>

    @if(session('success'))
    <div id="success-message" class="bg-green-500 text-white p-2 mb-4">
        {{ session('success') }}
    </div>
    @endif

    <a href="{{ route('certificate_images.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold my-4 py-2 px-4 rounded mb-4">Add Certificate</a>

    <table class="min-w-full bg-white border border-gray-200 mt-4">
        <thead>
            <tr class="bg-gray-100 border-b">
                <th class="py-2 px-4 border-r">ID</th>
                <th class="py-2 px-4 border-r">Title</th>
                <th class="py-2 px-4 border-r">Description</th>
                <th class="py-2 px-4 border-r">Images</th>
                <th class="py-2 px-4 border-r">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($certificateImages as $certificateImage)
                <tr class="border-b">
                    <td class="py-2 px-4 border-r">{{ $certificateImage->id }}</td>
                    <td class="py-2 px-4 border-r">{{ $certificateImage->title }}</td>
                    <td class="py-2 px-4 border-r">{{ $certificateImage->description }}</td>
                    <td class="py-2 px-4 border-r">
                        @foreach($certificateImage->files as $file)
                            <img src="{{ asset('storage/' . $file->path) }}" alt="{{ $certificateImage->title }}" class="w-32 h-32 object-cover rounded">
                        @endforeach
                    </td>
                    <td class="py-2 px-4 border-r">
                        {{-- <a href="{{ route('certificate_images.edit', $certificateImage->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-2 rounded">Edit</a> --}}
                        <form action="{{ route('certificate_images.destroy', $certificateImage->id) }}" method="POST" class="inline">
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
