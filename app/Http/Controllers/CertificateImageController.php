<?php

namespace App\Http\Controllers;



use App\Models\CertificateImage;
use App\Models\CertificateImageFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class CertificateImageController extends Controller
{

    public function index()
    {
        $certificateImages = CertificateImage::where('agent_id', Auth::id())->with('files')->get();
        return view('certificate_images.index', compact('certificateImages'));
    }

    public function create()
    {
        return view('certificate_images.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $certificateImage = CertificateImage::create([
            'agent_id' => Auth::id(),
            'title' => $request->input('title'),
            'description' => $request->input('description'),
        ]);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('certificates', 'public');
                CertificateImageFile::create([
                    'certificate_image_id' => $certificateImage->id,
                    'path' => $path,
                ]);
            }
        }

        return redirect()->route('certificate_images.index')->with('success', 'Certificate Image Added Successfully');
    }

    public function edit(CertificateImage $certificateImage)
    {
        return view('certificate_images.edit', compact('certificateImage'));
    }

    public function update(Request $request, CertificateImage $certificateImage)
    {
        dd('Update function called');
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $certificateImage->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
        ]);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('certificates', 'public');
                CertificateImageFile::create([
                    'certificate_image_id' => $certificateImage->id,
                    'path' => $path,
                ]);
            }
        }

        return redirect()->route('certificate_images.index')->with('success', 'Certificate Image Updated Successfully');
    }

    public function destroy(CertificateImage $certificateImage)
    {
        $certificateImage->files()->delete();
        $certificateImage->delete();
        return redirect()->route('certificate_images.index')->with('success', 'Certificate Image Deleted Successfully');
    }
}
