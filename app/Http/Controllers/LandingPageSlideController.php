<?php

namespace App\Http\Controllers;

use App\Models\SlideImgHomePage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LandingPageSlideController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $slides = SlideImgHomePage::latest()->get();
        return view('admin.landingsliders.index', compact('slides'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.landingsliders.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/slides', $imageName);
        }

        SlideImgHomePage::create([
            'title' => $request->title,
            'image' => $imageName,
        ]);

        return redirect()->route('admin.landingsliders.index')
            ->with('success', 'Slide created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SlideImgHomePage $landingslider)
    {
        return view('admin.landingsliders.edit', compact('landingslider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SlideImgHomePage $landingslider)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image
            if ($landingslider->image) {
                Storage::delete('public/slides/' . $landingslider->image);
            }

            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/slides', $imageName);
        } else {
            $imageName = $landingslider->image;
        }

        $landingslider->update([
            'title' => $request->title,
            'image' => $imageName,
        ]);

        return redirect()->route('admin.landingsliders.index')
            ->with('success', 'Slide updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SlideImgHomePage $landingslider)
    {
        if ($landingslider->image) {
            Storage::delete('public/slides/' . $landingslider->image);
        }

        $landingslider->delete();

        return redirect()->route('admin.landingsliders.index')
            ->with('success', 'Slide deleted successfully.');
    }
}
