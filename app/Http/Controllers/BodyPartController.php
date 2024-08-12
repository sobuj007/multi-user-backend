<?php

namespace App\Http\Controllers;
use App\Models\BodyPart;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class BodyPartController extends Controller
{
    public function index()
    {
        $bodyparts = BodyPart::with('subcategory')->get();
        return view('bodyparts.index', compact('bodyparts'));
    }

    public function create()
    {
        $subcategories = Subcategory::all();
        return view('bodyparts.create', compact('subcategories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'subcategory_id' => 'required|exists:subcategories,id',
            'bodypart_name' => 'required',

        ]);



        BodyPart::create([
            'subcategory_id' => $request->subcategory_id,
            'bodypart_name' => $request->bodypart_name,

        ]);

        return redirect()->route('bodyparts.index')->with('success', 'Body part created successfully.');
    }

    public function show(BodyPart $bodyPart)
    {
        return view('bodyparts.show', compact('bodyPart'));
    }

    public function edit(BodyPart $bodyPart)
    {
        $subcategories = Subcategory::all();
        return view('bodyparts.edit', compact('bodyPart', 'subcategories'));
    }

    public function update(Request $request, BodyPart $bodyPart)
    {
        $request->validate([
            'subcategory_id' => 'required|exists:subcategories,id',
            'bodypart_name' => 'required',

        ]);



        $bodyPart->update([
            'subcategory_id' => $request->subcategory_id,
            'bodypart_name' => $request->bodypart_name,

        ]);

        return redirect()->route('bodyparts.index')->with('success', 'Body part updated successfully.');
    }

    public function destroy(BodyPart $bodyPart)
    {
        $bodyPart->delete();
        return redirect()->route('bodyparts.index')->with('success', 'Body part deleted successfully.');
    }
}
