@extends('layouts.app')

@section('content')
    <h1 class="text-3xl font-bold mb-6">Service Products</h1>

    @if(session('success'))
        <div class="bg-green-500 text-white p-4 mb-4 rounded">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('services.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Add New Service</a>

    <table class="min-w-full mt-6 bg-white border border-gray-200">
        <thead>
            <tr class="bg-gray-100 text-gray-600">
                <th class="py-2 px-4 border-b">Name</th>
                <th class="py-2 px-4 border-b">Description</th>
                <th class="py-2 px-4 border-b">Price</th>
                <th class="py-2 px-4 border-b">Service Price</th>
                <th class="py-2 px-4 border-b">Category</th>
                <th class="py-2 px-4 border-b">Subcategory</th>
                <th class="py-2 px-4 border-b">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($services as $service)
                <tr class="border-b hover:bg-gray-50">
                    <td class="py-2 px-4">{{ $service->name }}</td>
                    <td class="py-2 px-4">{{ $service->description }}</td>
                    <td class="py-2 px-4">{{ $service->price }}</td>
                    <td class="py-2 px-4">{{ $service->servicePrice }}</td>
                    <td class="py-2 px-4">{{ $service->category }}</td>
                    <td class="py-2 px-4">{{ $service->subcategory }}</td>
                    <td class="py-2 px-4 flex space-x-2">
                        <a href="{{ route('services.edit', $service) }}" class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">Edit</a>
                        <form action="{{ route('services.destroy', $service) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600" onclick="return confirm('Are you sure you want to delete this service product?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            setTimeout(function() {
                $('#success-message').fadeOut('slow');
            }, 2000);
        });
    </script>
@endsection
