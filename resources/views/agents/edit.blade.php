@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Edit Agent</h1>
    <div class="bg-white p-6 rounded-lg shadow-md">
        <form action="{{ route('agents.update', $agent->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            {{-- <div class="mb-4">
                <label for="agent_id" class="block text-gray-700">Agent:</label>
                <select name="agent_id" id="agent_id" class="mt-1 block w-full" required>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" {{ $agent->agent_id == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                    @endforeach
                </select>
                @error('agent_id') <span class="text-red-500">{{ $message }}</span> @enderror
            </div> --}}
            <div class="mb-4">
                <label for="name" class="block text-gray-700">Store:</label>
                <input type="text" name="store" id="store" class="mt-1 block w-full" value="{{ $agent->store }}" required>
                @error('store') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <label for="profile_image" class="block text-gray-700">Profile Image:</label>
                <input type="file" name="profile_image" id="profile_image" class="mt-1 block w-full">
                @error('profile_image') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <label for="owner_name" class="block text-gray-700">Owner Name:</label>
                <input type="text" name="owner_name" id="owner_name" class="mt-1 block w-full" value="{{ $agent->owner_name }}" required>
                @error('owner_name') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <label for="mobile" class="block text-gray-700">Mobile:</label>
                <input type="text" name="mobile" id="mobile" class="mt-1 block w-full" value="{{ $agent->mobile }}" required>
                @error('mobile') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <label for="nid" class="block text-gray-700">NID:</label>
                <input type="text" name="nid" id="nid" class="mt-1 block w-full" value="{{ $agent->nid }}">
                @error('nid') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <label for="trade_licence" class="block text-gray-700">Trade Licence:</label>
                <input type="text" name="trade_licence" id="trade_licence" class="mt-1 block w-full" value="{{ $agent->trade_licence }}">
                @error('trade_licence') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <label for="address" class="block text-gray-700">Address:</label>
                <textarea name="address" id="address" class="mt-1 block w-full" required>{{ $agent->address }}</textarea>
                @error('address') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Update Agent</button>
        </form>
    </div>
@endsection
