<?php
namespace App\Http\Controllers;

use App\Models\ServiceProduct;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\City;
use App\Models\Location;
use App\Models\CertificateImage;
use App\Models\ServiceImage;
use App\Models\Agent;
use App\Models\BodyPart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServiceProductController extends Controller
{
    public function index()
    {
        $services = ServiceProduct::all();
        return view('services.index', compact('services'));
    }

    public function create()
    {
        // Assuming you have models for categories, subcategories, cities, and locations
        $categories = Category::all();
        $subcategories = Subcategory::all();
        $cities = City::all();
        $locations = Location::all();
        $bodyparts = BodyPart::all();

        return view('services.create', compact('categories', 'subcategories', 'cities', 'locations','bodyparts'));
    }

    public function store(Request $request)
    {
        $request->validate([

            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'servicePrice' => 'required|numeric',
            'category' => 'required|string',

            'subcategory' => 'required|string',
            'time' => 'required|array',
            'gender' => 'required|string',
            'location' => 'required|array',
            'rating' => 'nullable|numeric|min:0|max:5',
            'available' => 'required|string',
            'slot' => 'required|integer',
            'bodypart' => 'required|array',
            'image' => 'required|image|max:2048'
        ]);



    $data = $request->all();
    $data['agent_id'] = Auth::id(); // Add agent_id

    if ($request->hasFile('image')) {
        $data['img_url'] = $request->file('image')->store('servicesProduct', 'public');

    }

    ServiceProduct::create($data);

        return redirect()->route('services.index')->with('success', 'Service product added successfully.');
    }

    public function edit( $serviceProduct)
    { $serviceProduct=ServiceProduct::find($serviceProduct);
        $categories = Category::all();
        $subcategories = Subcategory::all();
        $cities = City::all();
        $locations = Location::all();


        return view('services.edit', compact('serviceProduct', 'categories', 'subcategories', 'cities', 'locations'));
    }


public function update(Request $request,  $serviceProduct)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'price' => 'required|numeric',
        'servicePrice' => 'required|numeric',
        'category' => 'required|exists:categories,id',
        'subcategory' => 'required|exists:subcategories,id',
        'bodypart' => 'array',
        'bodypart.*' => 'exists:bodyparts,id',
        'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        'city' => 'required|exists:cities,id',
        'location' => 'array',
        'location.*' => 'exists:locations,id',
        'gender' => 'required|in:Both,Male,Female',
        'rating' => 'required|numeric|min:0|max:5',
        'available' => 'required|string',
        'slot' => 'required|integer',
        'slotnumber' => 'required|integer|min:1',
        'time' => 'array',
        'time.*' => 'date_format:H:i',
    ]);

    $serviceProduct->update([
        'name' => $request->input('name'),
        'description' => $request->input('description'),
        'price' => $request->input('price'),
        'servicePrice' => $request->input('servicePrice'),
        'category_id' => $request->input('category'),
        'subcategory_id' => $request->input('subcategory'),
        'city_id' => $request->input('city'),
        'gender' => $request->input('gender'),
        'rating' => $request->input('rating'),
        'available' => $request->input('available'),
        'slot' => $request->input('slot'),
        'slotnumber' => $request->input('slotnumber'),
        'time' => $request->input('time'),
    ]);

    // Handle image upload if any
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('public/service_images');
        $serviceProduct->image_path = $imagePath;
        $serviceProduct->save();
    }

    // Update relationships
    $serviceProduct->bodyparts()->sync($request->input('bodypart', []));
    $serviceProduct->locations()->sync($request->input('location', []));

    return redirect()->route('services.index')->with('success', 'Service Product updated successfully.');
}


    public function destroy( $serviceProduct)
    {
        $serviceProduct=ServiceProduct::find($serviceProduct);
        $serviceProduct->delete();
        return redirect()->route('services.index')->with('success', 'Service product deleted successfully.');
    }


    public function getSubcategories($categoryId)
{
    try {
        $subcategories = Subcategory::where('category_id', $categoryId)->get();
        return response()->json(['subcategories' => $subcategories]);
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
}

public function getBodyparts($subcategoryId)
{
    $bodyparts = Bodypart::where('subcategory_id', $subcategoryId)->get();
    return response()->json(['bodyparts' => $bodyparts]);
}

    public function getLocations($cityId)
    {
        $locations = Location::where('city_id', $cityId)->get();
        return response()->json(['locations' => $locations]);
    }


    public function getallProduct(){
        // Retrieve all service products
        $serviceProducts = ServiceProduct::all();

        // Return the list as a JSON response
        return response()->json($serviceProducts);
    }
    // public function getproductbyId($request){
    //     // Retrieve all service products
    //     $serviceProducts = ServiceProduct::all();

    //     // Return the list as a JSON response
    //     return response()->json($serviceProducts);
    // }
    public function getproductbyId(Request $request)
    {
        // Validate the request to ensure `agent_id` is provided
        $request->validate([
            'agent_id' => 'required|integer|exists:users,id', // Assumes agent_id is a foreign key in the users table
        ]);

        // Retrieve the agent_id from the request
        $agentId = $request->input('agent_id');

        // Retrieve service products by agent_id
        $serviceProducts = ServiceProduct::where('agent_id', $agentId)->get();
        $agentcertificate=CertificateImage::where('agent_id',$agentId)->get();
        $agentservices=ServiceImage::where('agent_id',$agentId)->get();
        $agentprofile=Agent::where('agent_id',$agentId)->get();

        // Format the response
        $response = [
            'message' => 'Successfully retrieved data',
            'data' => $serviceProducts,
            'certificateimg' => $agentcertificate,
            'servicesimg' => $agentservices,
            'agentprofile' => $agentprofile,
        ];

        // Return the response as JSON
        return response()->json($response);
    }

}
