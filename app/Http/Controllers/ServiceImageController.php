<?php
namespace App\Http\Controllers;

use App\Models\ServiceImage;
use App\Models\ServiceImageFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ServiceImageController extends Controller
{
    public function index()
    {
        $serviceImages = ServiceImage::with('files')->get();
        return view('service_images.index', compact('serviceImages'));
    }

    public function create()
    {
        return view('service_images.create');
    }

    public function store(Request $request)
    {
        $request->validate([

            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $serviceImage = ServiceImage::create([
            'agent_id' => Auth::id(),
            'title' => $request->input('title'),
            'description' => $request->input('description'),
        ]);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('services', 'public');
                $serviceImage->files()->create([
                    'path' => $path,
                ]);
            }
        }

        return redirect()->route('service_images.index')->with('success', 'Service Image Created Successfully');
    }

    public function edit(ServiceImage $serviceImage)
    {
        // dd($serviceImage);
       return view('service_images.edit', compact('serviceImage'));
    }

    public function update(Request $request, ServiceImage $serviceImage)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $serviceImage->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
        ]);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('services', 'public');
                $serviceImage->files()->create([
                    'path' => $path,
                ]);
            }
        }

        return redirect()->route('service_images.index')->with('success', 'Service Image Updated Successfully');
    }

    public function destroy(ServiceImage $serviceImage)
    {
        $serviceImage->files()->delete();
        $serviceImage->delete();
        return redirect()->route('service_images.index')->with('success', 'Service Image Deleted Successfully');
    }
}
