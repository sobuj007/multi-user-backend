@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-2xl font-bold mb-4">{{ $certificateImage->title }}</h1>
    <p>{{ $certificateImage->description }}</p>
    <div class="mt-4">
        @foreach(json_decode($certificateImage->images, true) as $image)
            <img src="{{ asset('storage/' . $image) }}" alt="Certificate Image" class="h-32 w-32 object-cover inline-block">
        @endforeach
    </div>
    <a href="{{ route('certificate_images.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-4">Back to List</a>
</div>
@endsection
