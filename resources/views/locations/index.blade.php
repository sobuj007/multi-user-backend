@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Locations</h1>
    @if(session('success'))
    <div id="success-message" class="bg-green-500 text-white p-2 mb-4">
        {{ session('success') }}
    </div>
@endif
    <a href="{{ route('locations.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4 inline-block">Add Location</a>
    <div class="bg-white p-6 rounded-lg shadow-md">
        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th class="py-2">ID</th>
                    <th class="py-2">Name</th>
                    <th class="py-2">City</th>
                    <th class="py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($locations as $location)
                    <tr>
                        <td class="py-2">{{ $location->id }}</td>
                        <td class="py-2">{{ $location->name }}</td>
                        <td class="py-2">{{ $location->city->name }}</td>
                        <td class="py-2">
                            <a href="{{ route('locations.edit', $location->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-2 rounded">Edit</a>
                            <form action="{{ route('locations.destroy', $location->id) }}" method="POST" class="inline-block">
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
