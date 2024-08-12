@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Edit User</h1>
    <div class="bg-white p-6 rounded-lg shadow-md">
        <form action="{{ route('users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="role" class="block text-gray-700">Role:</label>
                <select name="role" id="role" class="mt-1 block w-full">
                    <option value="admin" @if($user->role == 'admin') selected @endif>Admin</option>
                    <option value="user" @if($user->role == 'user') selected @endif>User</option>
                    <option value="agent" @if($user->role == 'agent') selected @endif>Agent</option>
                </select>
                @error('role') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <label for="is_blocked" class="block text-gray-700">Blocked:</label>
                <select name="is_blocked" id="is_blocked" class="mt-1 block w-full">
                    <option value="0" @if(!$user->is_blocked) selected @endif>No</option>
                    <option value="1" @if($user->is_blocked) selected @endif>Yes</option>
                </select>
                @error('is_blocked') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <label for="subscription" class="block text-gray-700">Blocked:</label>
                <select name="subscription" class="mt-1 block w-full">
                    <option value="free" {{ $user->subscription == 'free' ? 'selected' : '' }}>Free</option>
                    <option value="silver" {{ $user->subscription == 'silver' ? 'selected' : '' }}>Silver</option>
                    <option value="gold" {{ $user->subscription == 'gold' ? 'selected' : '' }}>Gold</option>
                    <option value="platinum" {{ $user->subscription == 'platinum' ? 'selected' : '' }}>Platinum</option>
                </select>
                @error('subscription') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Update User</button>
        </form>
    </div>
@endsection
