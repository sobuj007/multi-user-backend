@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-6">Experts</h1>

    <a href="{{ route('experts.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4">Add Expert</a>

    @if(session('success'))
    <div id="success-message" class="bg-green-500 text-white p-2 mb-4">
        {{ session('success') }}
    </div>
@endif

    <table class="min-w-full bg-white shadow-md rounded my-6">
        <thead>
            <tr>
                <th class="py-3 px-5 text-left">Name</th>
                <th class="py-3 px-5 text-left">Gender</th>
                <th class="py-3 px-5 text-left">Expertise</th>
                <th class="py-3 px-5 text-left">Experience Year</th>
                <th class="py-3 px-5 text-left">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($experts as $expert)
                <tr>
                    <td class="py-3 px-5 border-b">{{ $expert->name }}</td>
                    <td class="py-3 px-5 border-b">{{ $expert->gender }}</td>
                    <td class="py-3 px-5 border-b">{{ $expert->expertise }}</td>
                    <td class="py-3 px-5 border-b">{{ $expert->experience_year }}</td>
                    <td class="py-3 px-5 border-b">
                        <a href="{{ route('experts.edit', $expert->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-2 rounded">Edit</a>
                        <form action="{{ route('experts.destroy', $expert->id) }}" method="POST" class="inline">
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
