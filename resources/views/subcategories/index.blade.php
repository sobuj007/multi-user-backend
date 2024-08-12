@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Subcategories</h1>
    @if(session('success'))
    <div id="success-message" class="bg-green-500 text-white p-2 mb-4">
        {{ session('success') }}
    </div>
@endif

    <a href="{{ route('subcategories.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4 inline-block">Add Subcategory</a>
    <div class="bg-white p-6 rounded-lg shadow-md">
        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th class="py-2">ID</th>
                    <th class="py-2">Category</th>
                    <th class="py-2">Name</th>
                    <th class="py-2">Image</th>
                    <th class="py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($subcategories as $subcategory)
                    <tr>
                        <td class="py-2">{{ $subcategory->id }}</td>
                        <td class="py-2">{{ $subcategory->category->name }}</td>
                        <td class="py-2">{{ $subcategory->subcategory_name }}</td>
                        <td class="py-2">
                            @if($subcategory->image)
                                <img src="{{ asset('storage/' . $subcategory->image) }}" alt="{{ $subcategory->subcategory_name }}" class="w-16 h-16 object-cover">
                            @else
                                No Image
                            @endif
                        </td>
                        <td class="py-2">
                            <a href="{{ route('subcategories.edit', $subcategory->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-2 rounded">Edit</a>
                            <form action="{{ route('subcategories.destroy', $subcategory->id) }}" method="POST" class="inline-block">
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
