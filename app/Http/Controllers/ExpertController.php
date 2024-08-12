<?php
namespace App\Http\Controllers;

use App\Models\Expert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExpertController extends Controller
{
    public function index()
    {
        // Get all experts for the authenticated agent
        $experts = Expert::where('agent_id', Auth::id())->get();
        return view('experts.index', compact('experts'));
    }

    public function create()
    {
        // Show form to create a new expert
        return view('experts.create');
    }

    public function store(Request $request)
    {
        // Validate the input
        $request->validate([
            'name' => 'required|string|max:255',
            'gender' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'expertise' => 'required|string|max:255',
            'certificate_name' => 'required|string|max:255',
            'certificate_images.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'experience_year' => 'required|integer',
        ]);

        // Handle image upload
        $imagePath = $request->file('image') ? $request->file('image')->store('experts', 'public') : null;
        $certificateImages = [];
        if ($request->hasFile('certificate_images')) {
            foreach ($request->file('certificate_images') as $image) {
                $certificateImages[] = $image->store('certificates', 'public');
            }
        }

        // Create the expert
        Expert::create([
            'agent_id' => Auth::id(),
            'name' => $request->input('name'),
            'gender' => $request->input('gender'),
            'image' => $imagePath,
            'expertise' => $request->input('expertise'),
            'certificate_name' => $request->input('certificate_name'),
            'certificate_images' => json_encode($certificateImages),
            'experience_year' => $request->input('experience_year'),
        ]);

        return redirect()->route('experts.index')->with('success', 'Expert added successfully.');
    }

    public function show(Expert $expert)
    {
        // Ensure the expert belongs to the authenticated agent
        $this->authorize('view', $expert);

        return view('experts.show', compact('expert'));
    }

    public function edit(Expert $expert)
    {
        // Ensure the expert belongs to the authenticated agent
        if ($expert->agent_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        return view('experts.edit', compact('expert'));
    }

    public function update(Request $request, Expert $expert)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'gender' => 'required|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        'expertise' => 'required|string|max:255',
        'certificate_name' => 'required|string|max:255',
        'certificate_images.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        'experience_year' => 'required|integer|min:0',
    ]);

    $expert->update([
        'name' => $request->input('name'),
        'gender' => $request->input('gender'),
        'expertise' => $request->input('expertise'),
        'certificate_name' => $request->input('certificate_name'),
        'experience_year' => $request->input('experience_year'),
    ]);

    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('experts', 'public');
        $expert->update(['image' => $imagePath]);
    }

    if ($request->hasFile('certificate_images')) {
        $existingImages = json_decode($expert->certificate_images, true) ?: [];
        foreach ($request->file('certificate_images') as $image) {
            $path = $image->store('certificates', 'public');
            $existingImages[] = $path;
        }
        $expert->update(['certificate_images' => json_encode($existingImages)]);
    }

    return redirect()->route('experts.index')->with('success', 'Expert updated successfully!');
}




public function removeImage(Request $request, Expert $expert, $image)
{
    $images = json_decode($expert->certificate_images, true) ?? [];
    if (($key = array_search($image, $images)) !== false) {
        unset($images[$key]);
        $expert->update(['certificate_images' => json_encode(array_values($images))]);
        Storage::disk('public')->delete($image);
    }

    return redirect()->back()->with('success', 'Image Removed Successfully');
}
public function destroy(Expert $expert)
{
 //   $expert->files()->delete();
    $expert->delete();
    return redirect()->route('experts.index')->with('success', 'expert Image Deleted Successfully');
}
}


