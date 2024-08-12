@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-6">Add Service Product</h1>
        <form action="{{ route('services.store') }}" method="POST" class="space-y-4"  enctype="multipart/form-data" class="space-y-4">
            @csrf
            <div>
                <label for="name" class="block text-gray-700 font-medium mb-1">Name</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required
                       class="w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label for="description" class="block text-gray-700 font-medium mb-1">Description</label>
                <textarea id="description" name="description" required
                          class="w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('description') }}</textarea>
            </div>
            <div>
                <label for="price" class="block text-gray-700 font-medium mb-1">Price</label>
                <input type="number" id="price" name="price" step="0.01" value="{{ old('price') }}" required
                       class="w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label for="servicePrice" class="block text-gray-700 font-medium mb-1">Service Price</label>
                <input type="number" id="servicePrice" name="servicePrice" step="0.01" value="{{ old('servicePrice') }}" required
                       class="w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label for="category" class="block text-gray-700 font-medium mb-1">Category</label>
                <select id="category" name="category" required
                        class="w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">Select Category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="subcategory" class="block text-gray-700 font-medium mb-1">Subcategory</label>
                <select id="subcategory" name="subcategory" required
                        class="w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">Select Subcategory</option>
                </select>
            </div>
            <div id="">
                <label for="bodypart" class="block text-gray-700 font-medium mb-1">Body Part</label>
                <div id="bodypart-container">
                    <!-- Checkboxes will be populated here -->
                </div>
            </div>
            <div>
                <label for="image" class="block text-gray-700 font-medium mb-1">Image</label>
                <input type="file" id="image" name="image"
                       class="w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label for="city" class="block text-gray-700 font-medium mb-1">City</label>
                <select id="city" name="city" required
                        class="w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">Select City</option>
                    @foreach($cities as $city)
                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="location" class="block text-gray-700 font-medium mb-1">Location</label>
                <div id="location">
                    <!-- Checkboxes will be populated here -->
                </div>
            </div>
            <div>
                <label for="gender" class="block text-gray-700 font-medium mb-1">Gender</label>
                <select id="gender" name="gender" required
                        class="w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="Both">Both</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>
            <div>
                <label for="rating" class="block text-gray-700 font-medium mb-1">Rating</label>
                <input type="number" id="rating" name="rating" step="0.1" min="0" max="5" value="{{ old('rating') }}" required
                       class="w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label for="available" class="block text-gray-700 font-medium mb-1">Available Time</label>
                <input type="text" id="available" name="available" value="{{ old('available') }}" required
                       class="w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label for="slot" class="block text-gray-700 font-medium mb-1">Slot</label>
                <input type="number" id="slot" name="slot" value="{{ old('slot') }}" required
                       class="w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <div>
                    <label for="slotnumber" class="block text-gray-700 font-medium mb-1">Number of Slots</label>
                    <input type="number" id="slotnumber" name="slotnumber" min="1" required
                           class="w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div id="time-slot-container"></div>
            </div>

            <button type="submit"
                    class="bg-blue-500 text-white px-4 py-2 rounded-md shadow-sm hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                Save
            </button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#category').change(function() {
                var categoryId = $(this).val();

                if (categoryId) {
                    $.ajax({
                        url: '/get-subcategories/'+categoryId ,
                        type: 'GET',
                        success: function(data) {
                            console.log(data);
                            $('#subcategory').empty().append('<option value="">Select Subcategory</option>');

                            $.each(data.subcategories, function(index, subcategory) {
                                $('#subcategory').append('<option value="' + subcategory.id + '">' + subcategory.subcategory_name + '</option>');
                            });

                        }
                    });
                } else {
                    console.log('no data');
                    $('#subcategory').empty().append('<option value="">Select Subcategory</option>');
                  //  $('#bodypart').empty().append('<option value="">Select Body Part</option>');
                }
            });
            $('#subcategory').change(function() {
                var bodypart = $(this).val();
                if (bodypart) {
                    $.ajax({
                        url: '/get-bodyparts/' + bodypart,
                        type: 'GET',
                        success: function(data) {
                            //$('#subcategory').empty().append('<option value="">Select Subcategory</option>');
                            $('#bodypart').empty().append('<option value="">Select Body Part</option>');

                            $.each(data.bodyparts, function(index, bodypart) {
                                // $('#bodypart').append('<option value="' + bodypart.id + '">' + bodypart.bodypart_name + '</option>');
                                $('#bodypart-container').append(`
                            <div>
                                <label>
                                    <input type="checkbox" name="bodypart[]" value="${bodypart.id}" />
                                    ${bodypart.bodypart_name}
                                </label>
                            </div>
                        `);

                            });
                        }
                    });
                } else {
                    $('#bodypart').empty().append('<option value="">Select Location</option>');
                }
            });

            $('#city').change(function() {
                var cityId = $(this).val();
                if (cityId) {
                    $.ajax({
                        url: '/get-locations/' + cityId,
                        type: 'GET',
                        success: function(data) {
                            $('#location').empty().append('<option value="">Select Location</option>');
                            $.each(data.locations, function(index, location) {
                                //$('#location').append('<option value="' + location.id + '">' + location.name + '</option>');
                                $('#location').append(`
                            <div>
                                <label>
                                    <input type="checkbox" name="location[]" value="${location.id}" />
                                    ${location.name}
                                </label>
                            </div>
                        `);


                            });
                        }
                    });
                } else {
                    $('#location').empty().append('<option value="">Select Location</option>');
                }
            });
        });
        /////////time
        $(document).ready(function() {
    $('#slotnumber').on('input', function() {
        let slotCount = $(this).val();
        let container = $('#time-slot-container');
        container.empty(); // Clear previous inputs

        for (let i = 1; i <= slotCount; i++) {
            container.append(`
                <div class="mt-4">
                    <label for="time_slot_${i}" class="block text-gray-700 font-medium mb-1">Time Slot ${i}</label>
                    <input type="time" id="time_slot_${i}" name="time[]" required
                           class="w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
            `);
        }
    });
});

    </script>


@endsection
