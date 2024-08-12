@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4">All Agents</h1>
    @if(session('success'))
        <div id="success-message" class="bg-green-500 text-white p-2 mb-4">
            {{ session('success') }}
        </div>
    @endif
    <div class="bg-white p-6 rounded-lg shadow-md">
        <a href="{{ route('agents.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4 inline-block">Add Agent</a>
        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th class="py-2">ID</th>
                    <th class="py-2">Agent name</th>
                    <th class="py-2">store</th>
                    <th class="py-2">Owner Name</th>
                    <th class="py-2">Mobile</th>
                    <th class="py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($agents as $agent)
                    <tr>
                        <td class="py-2">{{ $agent->id }}</td>
                        <td class="py-2">{{ $agent->user->name }}</td>
                        <td class="py-2">{{ $agent->store }}</td>
                        <td class="py-2">{{ $agent->owner_name }}</td>
                        <td class="py-2">{{ $agent->mobile }}</td>
                        <td class="py-2">
                            <a href="{{ route('agents.edit', $agent->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-2 rounded">Edit</a>
                            <form action="{{ route('agents.destroy', $agent->id) }}" method="POST" class="inline-block">
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
