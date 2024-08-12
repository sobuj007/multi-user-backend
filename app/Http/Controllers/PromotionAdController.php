<?php

namespace App\Http\Controllers;

use App\Models\PromotionAd;
use Illuminate\Http\Request;

class PromotionAdController extends Controller
{
    public function index()
    {
        $promotionsAds = PromotionAd::all();
        return view('promotionsAds.index', compact('promotionsAds'));
    }

    public function create()
    {
        return view('promotionsAds.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|max:1024', // 1MB Max
            'description' => 'nullable|string',
        ]);

        $promotionAd = new PromotionAd();
        $promotionAd->name = $request->name;

        if ($request->hasFile('image')) {
            $promotionAd->image = $request->file('image')->store('promotionsAds', 'public');
        }

        $promotionAd->description = $request->description;
        $promotionAd->save();

        return redirect()->route('promotionsAds.index')->with('success', 'Promotion Ad created successfully.');
    }

    public function show(PromotionAd $promotionsAd)
    {
        return view('promotionsAds.show', compact('promotionsAd'));
    }

    public function edit(PromotionAd $promotionsAd)
    {
        return view('promotionsAds.edit', compact('promotionsAd'));
    }

    public function update(Request $request, PromotionAd $promotionsAd)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|max:1024', // 1MB Max
            'description' => 'nullable|string',
        ]);

        $promotionsAd->name = $request->name;

        if ($request->hasFile('image')) {
            $promotionsAd->image = $request->file('image')->store('promotionsAds', 'public');
        }

        $promotionsAd->description = $request->description;
        $promotionsAd->save();

        return redirect()->route('promotionsAds.index')->with('success', 'Promotion Ad updated successfully.');
    }

    public function destroy(PromotionAd $promotionsAd)
    {
        $promotionsAd->delete();
        return redirect()->route('promotionsAds.index')->with('success', 'Promotion Ad deleted successfully.');
    }
}
