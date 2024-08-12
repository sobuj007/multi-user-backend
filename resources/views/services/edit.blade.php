@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-6">Add Service Product</h1>
        <form action="{{ route('services.store') }}" method="POST" class="space-y-4" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="name" class="block text-gray-700 font-medium mb-1">Name</label>
                <input type="text" id="name" name="name" value="{{ old('name', $serviceProduct->name ?? '') }}" required
                       class="w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label for="description" class="block text-gray-700 font-medium mb-1">Description</label>
                <textarea id="description" name="description" required
                          class="w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('description', $serviceProduct->description ?? '') }}</textarea>
            </div>
            <div>
                <label for="price" class="block text-gray-700 font-medium mb-1">Price</label>
                <input type="number" id="price" name="price" step="0.01" value="{{ old('price', $serviceProduct->price ?? '') }}" required
                       class="w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label for="servicePrice" class="block text-gray-700 font-medium mb-1">Service Price</label>
                <input type="number" id="servicePrice" name="servicePrice" step="0.01" value="{{ old('servicePrice', $serviceProduct->servicePrice ?? '') }}" required
                       class="w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label for="category" class="block text-gray-700 font-medium mb-1">Category</label>
                <select id="category" name="category" required
                        class="w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">Select Category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category', $serviceProduct->category_id ?? '') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="subcategory" class="block text-gray-700 font-medium mb-1">Subcategory</label>
                <select id="subcategory" name="subcategory" required
                        class="w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">Select Subcategory</option>
                    @if(isset($subcategories))
                        @foreach($subcategories as $subcategory)
                            <option value="{{ $subcategory->id }}" {{ old('subcategory', $serviceProduct->subcategory_id ?? '') == $subcategory->id ? 'selected' : '' }}>{{ $subcategory->subcategory_name }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
            <div>
                <label for="bodypart" class="block text-gray-700 font-medium mb-1">Body Part</label>
                <div id="bodypart-container">
                    @if(isset($bodyparts))
                        @foreach($bodyparts as $bodypart)
                            <div>
                                <label>
                                    <input type="checkbox" name="bodypart[]" value="{{ $bodypart->id }}" {{ in_array($bodypart->id, old('bodypart', $serviceProduct->bodypart_id ? $serviceProduct->bodypart_id->toArray() : [])) ? 'checked' : '' }}>
                                    {{ $bodypart->bodypart_name }}
                                </label>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
            <div>
                <label for="image" class="block text-gray-700 font-medium mb-1">Image</label>
                <input type="file" id="image" name="image"
                       class="w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                @if(isset($serviceProduct->image))
                    <p>Current Image: {{ $serviceProduct->image }}</p>
                @endif
            </div>
            <div>
                <label for="city" class="block text-gray-700 font-medium mb-1">City</label>
                <select id="city" name="city" required
                        class="w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">Select City</option>
                    @foreach($cities as $city)
                        <option value="{{ $city->id }}" {{ old('city', $serviceProduct->city_id ?? '') == $city->id ? 'selected' : '' }}>{{ $city->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="location" class="block text-gray-700 font-medium mb-1">Location</label>
                <div id="location">
                    @if(isset($locations))
                        @foreach($locations as $location)
                            <div>
                                <label>
                                    <input type="checkbox" name="location[]" value="{{ $location->id }}" {{ in_array($location->id, old('location', $serviceProduct->location_id ? $serviceProduct->location_id->toArray() : [])) ? 'checked' : '' }}>
                                    {{ $location->name }}
                                </label>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
            <div>
                <label for="gender" class="block text-gray-700 font-medium mb-1">Gender</label>
                <select id="gender" name="gender" required
                        class="w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="Both" {{ old('gender', $serviceProduct->gender ?? '') == 'Both' ? 'selected' : '' }}>Both</option>
                    <option value="Male" {{ old('gender', $serviceProduct->gender ?? '') == 'Male' ? 'selected' : '' }}>Male</option>
                    <option value="Female" {{ old('gender', $serviceProduct->gender ?? '') == 'Female' ? 'selected' : '' }}>Female</option>
                </select>
            </div>
            <div>
                <label for="rating" class="block text-gray-700 font-medium mb-1">Rating</label>
                <input type="number" id="rating" name="rating" step="0.1" min="0" max="5" value="{{ old('rating', $serviceProduct->rating ?? '') }}" required
                       class="w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label for="available" class="block text-gray-700 font-medium mb-1">Available Time</label>
                <input type="text" id="available" name="available" value="{{ old('available', $serviceProduct->available ?? '') }}" required
                       class="w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label for="slot" class="block text-gray-700 font-medium mb-1">Slot</label>
                <input type="number" id="slot" name="slot" value="{{ old('slot', $serviceProduct->slot ?? '') }}" required
                       class="w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label for="slotnumber" class="block text-gray-700 font-medium mb-1">Number of Slots</label>
                <input type="number" id="slotnumber" name="slotnumber" min="1" value="{{ old('slotnumber', $serviceProduct->slotnumber ?? '') }}" required
                       class="w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div id="time-slot-container">
                @if(old('time'))
                    @foreach(old('time') as $index => $time)
                        <div class="mt-4">
                            <label for="time_slot_{{ $index+1 }}" class="block text-gray-700 font-medium mb-1">Time Slot {{ $index+1 }}</label>
                            <input type="time" id="time_slot_{{ $index+1 }}" name="time[]" value="{{ $time }}" required
                                   class="w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                    @endforeach
                @elseif(isset($serviceProduct->time))
                    @foreach($serviceProduct->time as $index => $time)
                        <div class="mt-4">
                            <label for="time_slot_{{ $index+1 }}" class="block text-gray-700 font-medium mb-1">Time Slot {{ $index+1 }}</label>
                            <input type="time" id="time_slot_{{ $index+1 }}" name="time[]" value="{{ $time }}" required
                                   class="w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                    @endforeach
                @endif
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
    // Function to populate subcategories based on selected category
    function updateSubcategories() {
        var categoryId = $('#category').val();
        if (categoryId) {
            $.ajax({
                url: '/get-subcategories/' + categoryId,
                type: 'GET',
                success: function(data) {
                    $('#subcategory').empty().append('<option value="">Select Subcategory</option>');
                    $.each(data.subcategories, function(index, subcategory) {
                        $('#subcategory').append('<option value="' + subcategory.id + '">' + subcategory.subcategory_name + '</option>');
                    });

                    if (typeof initialSubcategoryId !== 'undefined') {
                        $('#subcategory').val(initialSubcategoryId).trigger('change');
                    }
                }
            });
        } else {
            $('#subcategory').empty().append('<option value="">Select Subcategory</option>');
        }
    }

    // Function to populate body parts based on selected subcategory
    function updateBodyparts() {
        var subcategoryId = $('#subcategory').val();
        if (subcategoryId) {
            $.ajax({
                url: '/get-bodyparts/' + subcategoryId,
                type: 'GET',
                success: function(data) {
                    $('#bodypart-container').empty();
                    $.each(data.bodyparts, function(index, bodypart) {
                        $('#bodypart-container').append(`
                            <div>
                                <label>
                                    <input type="checkbox" name="bodypart[]" value="${bodypart.id}" ${initialBodyparts && initialBodyparts.includes(bodypart.id) ? 'checked' : ''}>
                                    ${bodypart.bodypart_name}
                                </label>
                            </div>
                        `);
                    });
                }
            });
        } else {
            $('#bodypart-container').empty();
        }
    }

    // Function to populate locations based on selected city
    function updateLocations() {
        var cityId = $('#city').val();
        if (cityId) {
            $.ajax({
                url: '/get-locations/' + cityId,
                type: 'GET',
                success: function(data) {
                    $('#location').empty();
                    $.each(data.locations, function(index, location) {
                        $('#location').append(`
                            <div>
                                <label>
                                    <input type="checkbox" name="location[]" value="${location.id}" ${initialLocations && initialLocations.includes(location.id) ? 'checked' : ''}>
                                    ${location.name}
                                </label>
                            </div>
                        `);
                    });
                }
            });
        } else {
            $('#location').empty();
        }
    }

    // Initial values from the backend or previously submitted data
    var initialCategoryId = '{{ old('category', $serviceProduct->category_id ?? '') }}';
    var initialSubcategoryId = '{{ old('subcategory', $serviceProduct->subcategory_id ?? '') }}';
    var initialBodyparts = @json(old('bodypart', $serviceProduct->bodypart_id ? $serviceProduct->bodypart_id->toArray() : []));
    var initialCityId = '{{ old('city', $serviceProduct->city_id ?? '') }}';
    var initialLocations = @json(old('location', $serviceProduct->location_id ? $serviceProduct->location_id->toArray() : []));

    // Trigger change events if there are initial values
    if (initialCategoryId) {
        $('#category').val(initialCategoryId).trigger('change');
    }
    if (initialSubcategoryId) {
        $('#subcategory').val(initialSubcategoryId).trigger('change');
    }
    if (initialCityId) {
        $('#city').val(initialCityId).trigger('change');
    }

    // Attach event handlers
    $('#category').change(updateSubcategories);
    $('#subcategory').change(updateBodyparts);
    $('#city').change(updateLocations);


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

                @if(old('time'))
                    $.each({{ json_encode(old('time')) }}, function(index, time) {
                        $('#time_slot_' + (index + 1)).val(time);
                    });
                @endif
            });

        });
    </script>
@endsection

